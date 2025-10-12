<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = 'customer/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
        $this->middleware('auth:customer')->only('logout');
    }

    public function showLoginForm(Request $request)
    {
        $redirectTo = $request->get('redirect_to', '');
        return view('customer.login', compact('redirectTo'));
    }

    protected function guard()
    {
        return \Auth::guard('customer');
    }

    public function logout(Request $request)
    {
        $this->guard('customer')->logout();

        return redirect('/');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($request->has('redirect_to') && $request->redirect_to === 'checkout') {
            // session এ flag রাখো
            session(['show_checkout' => true]);
            return redirect()->route('cart');
        }

        return redirect()->route('customer.dashboard');
    }
}
