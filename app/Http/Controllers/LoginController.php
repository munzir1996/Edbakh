<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class LoginController extends Controller
{

    public function loginPage(){

        return view('admin.login');

    }

    public function login(Request $request)
    {

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {

            if(App::getLocale() == 'ar') {
               
                return redirect(url('/ar'));

            }else {

                return redirect(url('/en'));                

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

        if (App::getLocale() == 'ar') {
            return redirect(url('/ar'));
        } else {
            return redirect(url('/en'));
        }
        

    }

}
