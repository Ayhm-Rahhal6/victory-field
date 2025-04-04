<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
    
        // توجيه المستخدم حسب الدور
        if (Auth::user()->role === 'super_admin') {
            return redirect('/admin'); // أو أي مسار خاص بالـ super admin
        } elseif (Auth::user()->role === 'admin') {
            return redirect('/admin'); // مسار الـ admin العادي
        } else {
            return redirect('/'); // الصفحة الرئيسية للمستخدمين العاديين
        }
    }

    return back()->withErrors([
        'email' => 'These credentials do not match our records.',
    ]);
}
}
