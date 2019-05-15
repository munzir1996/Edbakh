<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    //
    public function loginPage()
    {
        // Replace it with your login form view

        return view('admin.login');
    }

    public function login(Request $request){

        //
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->back()->withInput($request->only('email'));
        }

    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Log the admin out of the application.
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        // Replace it with your own route { login form }
        return view('admin.login');
    }
}
