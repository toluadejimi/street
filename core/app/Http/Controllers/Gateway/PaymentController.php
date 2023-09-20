<?php

namespace App\Http\Controllers\Gateway;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Models\AdminNotification;
use App\Models\Deposit;
use App\Models\GatewayCurrency;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function deposit()
    {
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();
        $pageTitle = 'Deposit Methods';
        return view($this->activeTemplate . 'user.payment.deposit', compact('gatewayCurrency', 'pageTitle'));
    }

    public function depositInsert(Request $request)
    {
    

        $request->validate([
            'amount'      => 'required|numeric|gt:0',
        ]);


        $key = env('WEBKEY');
        $ref = getTrx();
        $email = Auth::user()->email;

        $url = "https://web.enkpay.com/pay?amount=$request->amount&key=$key&ref=$ref&email=$email";


        $data                  = new Deposit();
        $data->user_id         = Auth::id();
        $data->method_code     = 102;
        $data->method_currency = "NGN";
        $data->amount          = $request->amount;
        $data->charge          = 0;
        $data->rate            = 0;
        $data->final_amo       = $request->amount;
        $data->btc_amo         = 0;
        $data->btc_wallet      = "";
        $data->trx             = $ref;
        $data->save();
        return Redirect::to($url);
    }




    public function verify_payment(request $request)
    {

        $trx_id = $request->trans_id;
        $ip = $request->ip();
        $status = $request->status;


        if ($status == 'failed') {

            Deposit::where('trx', $trx_id)->where('status', 0)->update(['status' => 3]);


            // $message =  Auth::user()->name . "| canceled funding |";
            // send_notification($message);

            return redirect('user/deposit/history')->with('error', 'Transaction Declined');
        }




        $trxstatus = Deposit::where('trx', $trx_id)->first()->status ?? null;

        if ($trxstatus == 1) {

            // $message =  Auth::user()->name . "| is trying to fund  with | $request->trx_id  | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
            // send_notification($message);
            return redirect('user/deposit/history')->with('error', 'Transaction already confirmed or not found');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://web.enkpay.com/api/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('trans_id' => "$trx_id"),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $status1 = $var->detail ?? null;
        $amount = $var->price ?? null;




        if ($status1 == 'success') {

            Deposit::where('trx', $trx_id)->update(['status' => 1]);
            User::where('id', Auth::id())->increment('balance', $amount);
            $order_id = $trx_id; 
            resolve_complete($order_id);

            // $message =  Auth::user()->name . "| funding successful |" . number_format($amount, 2) . "\n\n IP ====> $ip". "\n\n OrderID ====> $trx_id";
            // send_notification($message);

            $usr = User::where('id', Auth::id())->first() ?? null;

            // if ($usr->email != null) {

            //     $data = array(
            //         'fromsender' => 'admin@oprime.com.ng', 'Oprime',
            //         'subject' => "Wallet Funded",
            //         'toreceiver' => Auth::user()->email,
            //         'amount' => $amount,
            //         'name' => Auth::user()->name,

            //     );


            //     Mail::send('mails.fund', ["data1" => $data], function ($message) use ($data) {
            //         $message->from($data['fromsender']);
            //         $message->to($data['toreceiver']);
            //         $message->subject($data['subject']);
            //     });
            // }

            return redirect('user/deposit/history')->with('message', "Wallet has been funded with $amount");
        }

        // $message =  Auth::user()->name . "| is trying to fund  with | $request->trx_id  | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
        // send_notification($message);

        return redirect('user/deposit/history')->with('error', 'Transaction already confirmed or not found');
    }














    public function appDepositConfirm($hash)
    {
        try {
            $id = decrypt($hash);
        } catch (\Exception $ex) {
            return "Sorry, invalid URL.";
        }

        $data = Deposit::where('id', $id)->where('status', Status::PAYMENT_INITIATE)->orderBy('id', 'DESC')->firstOrFail();
        $user = User::findOrFail($data->user_id);
        auth()->login($user);
        session()->put('Track', $data->trx);
        return to_route('user.deposit.confirm');
    }

    public function depositConfirm()
    {
        $track   = session()->get('Track');
        $deposit = Deposit::where('trx', $track)->where('status', Status::PAYMENT_INITIATE)->orderBy('id', 'DESC')->with('gateway')->firstOrFail();

        if ($deposit->method_code >= 1000) {
            return to_route('user.deposit.manual.confirm');
        }

        $dirName = $deposit->gateway->alias;
        $new     = __NAMESPACE__ . '\\' . $dirName . '\\ProcessController';

        $data = $new::process($deposit);
        $data = json_decode($data);

        if (isset($data->error)) {
            $notify[] = ['error', $data->message];
            return to_route(gatewayRedirectUrl())->withNotify($notify);
        }

        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }

        // for Stripe V3
        if (@$data->session) {
            $deposit->btc_wallet = $data->session->id;
            $deposit->save();
        }

        $pageTitle = 'Payment Confirm';
        return view($this->activeTemplate . $data->view, compact('data', 'pageTitle', 'deposit'));
    }

    public static function userDataUpdate($deposit, $isManual = null)
    {
        if ($deposit->status == Status::PAYMENT_INITIATE || $deposit->status == Status::PAYMENT_PENDING) {
            $deposit->status = Status::PAYMENT_SUCCESS;
            $deposit->save();

            $user = User::find($deposit->user_id);
            $user->balance += $deposit->amount;
            $user->save();

            $transaction               = new Transaction();
            $transaction->user_id      = $deposit->user_id;
            $transaction->amount       = $deposit->amount;
            $transaction->post_balance = $user->balance;
            $transaction->charge       = $deposit->charge;
            $transaction->trx_type     = '+';
            $transaction->details      = 'Deposit Via ' . $deposit->gatewayCurrency()->name;
            $transaction->trx          = $deposit->trx;
            $transaction->remark       = 'deposit';
            $transaction->save();

            if (!$isManual) {
                $adminNotification            = new AdminNotification();
                $adminNotification->user_id   = $user->id;
                $adminNotification->title     = 'Deposit successful via ' . $deposit->gatewayCurrency()->name;
                $adminNotification->click_url = urlPath('admin.deposit.successful');
                $adminNotification->save();
            }

            notify($user, $isManual ? 'DEPOSIT_APPROVE' : 'DEPOSIT_COMPLETE', [
                'method_name'     => $deposit->gatewayCurrency()->name,
                'method_currency' => $deposit->method_currency,
                'method_amount'   => showAmount($deposit->final_amo),
                'amount'          => showAmount($deposit->amount),
                'charge'          => showAmount($deposit->charge),
                'rate'            => showAmount($deposit->rate),
                'trx'             => $deposit->trx,
                'post_balance'    => showAmount($user->balance),
            ]);
        }
    }

    public function manualDepositConfirm()
    {
        $track = session()->get('Track');
        $data  = Deposit::with('gateway')->where('status', Status::PAYMENT_INITIATE)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }

        if ($data->method_code > 999) {

            $pageTitle = 'Deposit Confirm';
            $method    = $data->gatewayCurrency();
            $gateway   = $method->method;
            return view($this->activeTemplate . 'user.payment.manual', compact('data', 'pageTitle', 'method', 'gateway'));
        }

        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = session()->get('Track');
        $data  = Deposit::with('gateway')->where('status', Status::PAYMENT_INITIATE)->where('trx', $track)->first();
        if (!$data) {
            return to_route(gatewayRedirectUrl());
        }

        $gatewayCurrency = $data->gatewayCurrency();
        $gateway         = $gatewayCurrency->method;
        $formData        = $gateway->form->form_data;

        $formProcessor  = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);

        $data->detail = $userData;
        $data->status = Status::PAYMENT_PENDING;
        $data->save();

        $adminNotification            = new AdminNotification();
        $adminNotification->user_id   = $data->user->id;
        $adminNotification->title     = 'Deposit request from ' . $data->user->username;
        $adminNotification->click_url = urlPath('admin.deposit.details', $data->id);
        $adminNotification->save();

        notify($data->user, 'DEPOSIT_REQUEST', [
            'method_name'     => $data->gatewayCurrency()->name,
            'method_currency' => $data->method_currency,
            'method_amount'   => showAmount($data->final_amo),
            'amount'          => showAmount($data->amount),
            'charge'          => showAmount($data->charge),
            'rate'            => showAmount($data->rate),
            'trx'             => $data->trx,
        ]);

        $notify[] = ['success', 'You have deposit request has been taken'];
        return to_route('user.deposit.history')->withNotify($notify);
    }
}