<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{

    public function loginPage(){

        return view('admin.login');

    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if(Auth::user()->role == 1) {

                return redirect(url('/admin/home'));

            }else {

                if(Auth::user()->activity == 1){

                    return redirect(url('/home'));

                }else {

                    Auth::logout();

                    return back()
                        ->withErrors(['account_closed' => 'عفواً تم اغلاق الحساب ، قم بمراجعة الادارة']);

                }

            }

        }else {

            return back()
                ->withErrors(['incorrect_credentials' => 'Sorry , Please Check Your Credential']);

        }
    }

    public function logout(){

        DB::table('users')

            ->where('id', Auth::user()->id)
            ->update(['last_seen' => now()]);

        Auth::logout();

        return redirect()->intended('/admin');

    }

}
