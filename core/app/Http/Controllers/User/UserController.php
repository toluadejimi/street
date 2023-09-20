<?php

namespace App\Http\Controllers\User;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\GoogleAuthenticator;
use App\Models\Category;
use App\Models\Deposit;
use App\Models\Flag;
use App\Models\GeneralSetting;
use App\Models\InstantService;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Service;
use App\Models\SupportTicket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function home()
    {
        $pageTitle                   = 'Dashboard';
        $user                        = auth()->user();
        $widget['balance']           = $user->balance;
        $widget['total_spent']       = Order::where('status', '!=', Status::ORDER_REFUNDED)->where('user_id', $user->id)->sum('price');
        $widget['total_transaction'] = Transaction::where('user_id', $user->id)->count();
        $widget['total_order']       = Order::where('user_id', $user->id)->count();
        $widget['pending_order']     = Order::where('user_id', $user->id)->pending()->count();
        $widget['processing_order']  = Order::where('user_id', $user->id)->processing()->count();
        $widget['completed_order']   = Order::where('user_id', $user->id)->completed()->count();
        $widget['cancelled_order']   = Order::where('user_id', $user->id)->cancelled()->count();
        $widget['refunded_order']    = Order::where('user_id', $user->id)->refunded()->count();
        $widget['deposit']           = Deposit::successful()->where('user_id', $user->id)->sum('amount');
        $widget['total_service']     = Service::active()->count();
        $widget['total_ticket']      = SupportTicket::where('user_id', $user->id)->count();

        $whatsapp_link = GeneralSetting::where('id', 1)->first()->whatsapp_link;
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'widget', 'whatsapp_link'));
    }

    public function depositHistory(Request $request)
    {
        $pageTitle       = 'Deposit History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('pageTitle', 'deposits'));
    }

    public function show2faForm()
    {
        $general   = gs();
        $ga        = new GoogleAuthenticator();
        $user      = auth()->user();
        $secret    = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->site_name, $secret);
        $pageTitle = '2FA Setting';
        return view($this->activeTemplate . 'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key'  => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);

        if ($response) {
            $user->tsc = $request->key;
            $user->ts  = Status::ENABLE;
            $user->save();
            $notify[] = ['success', 'Google authenticator activated successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user     = auth()->user();
        $response = verifyG2fa($user, $request->code);

        if ($response) {
            $user->tsc = null;
            $user->ts  = Status::DISABLE;
            $user->save();
            $notify[] = ['success', 'Two factor authenticator deactivated successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }

        return back()->withNotify($notify);
    }

    public function transactions(Request $request)
    {
        $pageTitle    = 'Transactions';
        $remarks      = Transaction::distinct('remark')->orderBy('remark')->get('remark');
        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function attachmentDownload($fileHash)
    {
        $filePath  = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general   = gs();
        $title     = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype  = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $pageTitle = 'User Data';
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();

        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }

        $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname  = $request->lastname;
        $user->address   = [
            'country' => @$user->address->country,
            'address' => $request->address,
            'state'   => $request->state,
            'zip'     => $request->zip,
            'city'    => $request->city,
        ];
        $user->profile_complete = 1;
        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function services()
    {
        $pageTitle  = 'Social Media Marketing';
        $categories = Category::active()->whereHas('services', function ($services) {
            return $services->active();
        })->orderBy('name')->get();

        $whatsapp_link = GeneralSetting::where('id', 1)->first()->whatsapp_link;
        return view($this->activeTemplate . 'user.services.services', compact('pageTitle', 'categories', 'whatsapp_link'));
    }

    public function serviceCategory($id)
    {
        $category  = Category::active()->findOrFail($id);
        $pageTitle = $category->name;
        $services  = Service::active()->where('category_id', $id)->paginate(getPaginate());
        return view($this->activeTemplate . 'user.services.category', compact('pageTitle', 'services'));
    }


    public function instant_verification()
    {
        $pageTitle  = 'Instant Verification';


        $countries = Flag::inRandomOrder()->limit(23)->get();
        $services = InstantService::inRandomOrder()->limit(23)->get();


        $mcountries = Flag::inRandomOrder()->limit(6)->get();
        $mservices = InstantService::inRandomOrder()->limit(6)->get();

        $country = null;
        $amount = null;
        $count = null;
        $service = null;
        $number_view = null;

        return view($this->activeTemplate . 'user.instant', compact('pageTitle', 'mcountries', 'number_view', 'service', 'amount', 'count', 'country', 'countries', 'mservices',  'services'));
    }



    public function voice()
    {
        $pageTitle  = 'Buy Google Voice';

        $products = Product::all();

        return view($this->activeTemplate . 'user.voice', compact('pageTitle', 'products'));
    }


    public function get_number(request $request)
    {


        $get_country = $request->country;
        $get_service = $request->service;
        $api_key = env('POKEY');


        $country = Flag::where('country', $get_country)->first()->code;
        $service = InstantService::where('service', $get_service)->first()->code;



        $wallet = Auth::user()->wallet;

        $countries = Flag::all();
        $services = InstantService::all();




        $get_rate = Rate::where('pair', 'usd')->first()->amount;
        $getrate = Rate::where('pair', 'ngn')->first()->amount;




        if ($getrate == null) {
            $rate = 780;
        }
        $ngn_rate = (int)$getrate;
        $get_service_price = Http::get("https://simsms.org/priemnik.php?metod=get_service_price&country=$country&service=$service&apikey=$api_key")->json();
        $get_count = Http::get("https://simsms.org/priemnik.php?metod=get_count_new&service=$service&apikey=$api_key&country=$country")->json();
        $service_price = $get_service_price['price'] ?? null;

        $get_amount = round($service_price * $get_rate * $ngn_rate);

        if ($get_amount <= 500) {
            $amount = 1000;
        } elseif ($get_amount <= 1000) {

            $amount = 1800;
        } elseif ($get_amount <= 1800) {

            $amount = 2800;
        } elseif ($get_amount <= 1800) {
            $amount = 3800;
        } elseif ($get_amount <= 3800) {
            $amount = 3000;
        } elseif ($get_amount <= 4800) {

            $amount = 5800;
        } else {

            $amount = 7800;
        }

        $flag =  Flag::where('code', $country)->first()->flag ?? null;
        $country =  Flag::where('code', $country)->first()->country ?? null;

        $service =  InstantService::where('code', $service)->first()->service ?? null;

        $count =  $get_count['total'] ?? null;

        $number_view = 2;


        $mcountries = Flag::inRandomOrder()->limit(6)->get();
        $mservices = InstantService::inRandomOrder()->limit(6)->get();

        $pageTitle  = 'Instant Verification';


        $countries = Flag::inRandomOrder()->limit(23)->get();
        $services = InstantService::inRandomOrder()->limit(23)->get();




        if ($service_price == null || $count == null) {
            return back()->with('error', 'Number not available, check server 2');
        }

        return view($this->activeTemplate . 'user.instant', compact('amount', 'pageTitle', 'mcountries',  'number_view', 'mservices', 'count', 'country', 'flag', 'service', 'wallet', 'countries', 'services'))->with('message', "Number is availave for use");
    }



    public function buy_instant(request $request)
    {


        $country = $request->country;
        $service = $request->service;
        $amount = $request->amount;

        $api_key = env('POKEY');

        $get_country_code =  Flag::where('country', $country)->first()->code ?? null;
        $get_service_code =  InstantService::where('service', $service)->first()->code ?? null;

        $wallet = Auth::user()->balance;

        $countries = Flag::all();
        $services = InstantService::all();

        if ($amount > $wallet) {
            return back()->with('error', 'Insufficient Balance, Please Fund your wallet');
        }




        $get_number = Http::get("https://simsms.org/priemnik.php?metod=get_number&country=$get_country_code&service=$get_service_code&apikey=$api_key")->json();
        $response = $get_number['response'] ?? null;

        if ($response == 1) {

            $number = $get_number['number'] ?? null;
            $country_code = $get_number['CountryCode'] ?? null;
            $id = $get_number['id'] ?? null;
            $country = $get_number['country'] ?? null;
            $number_view = 1;


            $country_cc = $get_country_code;
            $service_cc = $get_service_code;



            $get_rate = Rate::where('pair', 'usd')->first()->amount;
            $getrate = Rate::where('pair', 'ngn')->first()->amount;



            if ($getrate == null) {
                $rate = 780;
            }
            $ngn_rate = (int)$getrate;
            $get_service_price = Http::get("https://simsms.org/priemnik.php?metod=get_service_price&country=$country&service=$service&apikey=$api_key")->json() ?? null;
            $get_count = Http::get("https://simsms.org/priemnik.php?metod=get_count_new&service=$service&apikey=$api_key&country=$country")->json() ?? null;



            $service_price = $get_service_price['price'] ?? null;



            $get_amount = round($service_price * $get_rate * $ngn_rate);

            if ($get_amount <= 500) {
                $amount = 1000;
            } elseif ($get_amount <= 1000) {

                $amount = 1800;
            } elseif ($get_amount <= 1800) {

                $amount = 2800;
            } elseif ($get_amount <= 1800) {

                $amount = 3800;
            } elseif ($get_amount <= 3800) {

                $amount = 3000;
            } elseif ($get_amount <= 4800) {

                $amount = 5800;
            } else {

                $amount = 7800;
            }



            $flag =  Flag::where('code', $country)->first()->flag ?? null;
            $country_name =  Flag::where('code', $country)->first()->country ?? null;

            $country =  Flag::where('code', $country)->first()->country ?? null;



            $service =  InstantService::where('code', $service)->first()->service ?? null;

            $count =  $get_count['total'] ?? null;


            $mcountries = Flag::inRandomOrder()->limit(6)->get();
            $mservices = InstantService::inRandomOrder()->limit(6)->get();

            $pageTitle  = 'Instant Verification';


            $countries = Flag::inRandomOrder()->limit(23)->get();
            $services = InstantService::inRandomOrder()->limit(23)->get();

            return view($this->activeTemplate . 'user.instant', compact('amount', 'pageTitle', 'mcountries', 'mservices', 'service_cc', 'country_cc', 'id', 'number', 'country_name', 'country_code', 'number_view', 'count', 'country', 'flag', 'service', 'wallet', 'countries', 'services'))->with('message', "Number is availave for use");
        } else {

            return back()->with('error', 'Service not available, Try server 2');
        }
    }


    public function ban(Request $request)
    {

        $service = $request->service;
        $id = $request->id;
        $api_key = env('POKEY');


        $ban_sms = Http::get("https://simsms.org/priemnik.php?metod=ban&service=$service&id=$id&apikey=$api_key")->json();

        $response = $ban_sms['response'] ?? null;


        if($response == 1){

            $pageTitle  = 'Instant Verification';


            $countries = Flag::inRandomOrder()->limit(23)->get();
            $services = InstantService::inRandomOrder()->limit(23)->get();


            $mcountries = Flag::inRandomOrder()->limit(6)->get();
            $mservices = InstantService::inRandomOrder()->limit(6)->get();

            $country = null;
            $amount = null;
            $count = null;
            $service = null;
            $number_view = null;

            return view($this->activeTemplate . 'user.instant', compact('pageTitle', 'mcountries', 'number_view', 'service', 'amount', 'count', 'country', 'countries', 'mservices',  'services'));

        }else{


            $pageTitle  = 'Instant Verification';


            $countries = Flag::inRandomOrder()->limit(23)->get();
            $services = InstantService::inRandomOrder()->limit(23)->get();


            $mcountries = Flag::inRandomOrder()->limit(6)->get();
            $mservices = InstantService::inRandomOrder()->limit(6)->get();

            $country = null;
            $amount = null;
            $count = null;
            $service = null;
            $number_view = null;

            return view($this->activeTemplate . 'user.instant', compact('pageTitle', 'mcountries', 'number_view', 'service', 'amount', 'count', 'country', 'countries', 'mservices',  'services'));


        }


        if($response == 2){

            $pageTitle  = 'Instant Verification';
            $countries = Flag::inRandomOrder()->limit(23)->get();
            $services = InstantService::inRandomOrder()->limit(23)->get();


            $mcountries = Flag::inRandomOrder()->limit(6)->get();
            $mservices = InstantService::inRandomOrder()->limit(6)->get();

            $country = null;
            $amount = null;
            $count = null;
            $service = null;
            $number_view = null;

            return view($this->activeTemplate . 'user.instant', compact('pageTitle', 'mcountries', 'number_view', 'service', 'amount', 'count', 'country', 'countries', 'mservices',  'services'));

        }


        $pageTitle  = 'Instant Verification';


        $countries = Flag::inRandomOrder()->limit(23)->get();
        $services = InstantService::inRandomOrder()->limit(23)->get();


        $mcountries = Flag::inRandomOrder()->limit(6)->get();
        $mservices = InstantService::inRandomOrder()->limit(6)->get();

        $country = null;
        $amount = null;
        $count = null;
        $service = null;
        $number_view = null;

        return view($this->activeTemplate . 'user.instant', compact('pageTitle', 'mcountries', 'number_view', 'service', 'amount', 'count', 'country', 'countries', 'mservices',  'services'));




    }


}
