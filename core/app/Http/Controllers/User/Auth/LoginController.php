<?php

namespace App\Http\Controllers\User\Auth;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Service;
use App\Models\SupportTicket;
use App\Models\Transaction;
use App\Models\UserLogin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view($this->activeTemplate . 'user.auth.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {



        $pageTitle = "Dashboard";

        $request->validate([
            'email' => 'required|string',
        ]);


        $credentials = request(['email', 'password']);


        if (!auth()->attempt($credentials)) {
            return back()->with('error', "Email or Password Incorrect");
        }


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






        // $this->validateLogin($request);

        // $request->session()->regenerateToken();

        // if (!verifyCaptcha()) {
        //     $notify[] = ['error', 'Invalid captcha provided'];
        //     return back()->withNotify($notify);
        // }

        // // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // // the login attempts for this application. We'll key this by the username and
        // // the IP address of the client making these requests into this application.
        // if ($this->hasTooManyLoginAttempts($request)) {
        //     $this->fireLockoutEvent($request);

        //     return $this->sendLockoutResponse($request);
        // }

        // if ($this->attemptLogin($request)) {
        //     return $this->sendLoginResponse($request);
        // }

        // // If the login attempt was unsuccessful we will increment the number of attempts
        // // to login and redirect the user back to the login form. Of course, when this
        // // user surpasses their maximum number of attempts they will get locked out.
        // $this->incrementLoginAttempts($request);


        // return $this->sendFailedLoginResponse($request);
    }

    public function findUsername()
    {
        $login = request()->input('username');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    protected function validateLogin(Request $request)
    {

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout()
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        $notify[] = ['success', 'You have been logged out.'];
        return to_route('user.login')->withNotify($notify);
    }





    public function authenticated(Request $request, $user)
    {
        $user->tv = $user->ts == 1 ? 0 : 1;
        $user->save();
        $ip = getRealIP();
        $exist = UserLogin::where('user_ip', $ip)->first();
        $userLogin = new UserLogin();
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->city =  $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        } else {
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',', $info['long']);
            $userLogin->latitude =  @implode(',', $info['lat']);
            $userLogin->city =  @implode(',', $info['city']);
            $userLogin->country_code = @implode(',', $info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

        return to_route('user.home');
    }
}
