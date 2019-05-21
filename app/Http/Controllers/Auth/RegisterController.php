<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Plan;
use App\City;
use App\Recipe;
use App\Date;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){

        $plans = Plan::all();
        $cities = City::all();
        $dates = Date::all();
        //dd($plans);
        return view('sign_up', compact(['plans', 'cities', 'dates']));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        return $request;
        return Validator::make($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'city_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        return $request;
        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'city_id' => $request['city_id'],
        ]);
        return $request;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recipes($id)
    {
        $recipes = Recipe::where('plan_id', $id)->get();
        $dates = Date::all();
        
        return(['recipes' => $recipes, 'dates' => $dates]);
    }

}
