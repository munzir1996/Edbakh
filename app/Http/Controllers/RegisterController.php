<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscribe;
use App\Order;
use Auth;
use Session;

class RegisterController extends Controller
{
    
    public function user(Request $request){

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'city_id' => 'required',
        ]);

        $user = new User;

        $user->first_name  = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->address  = $request->address;
        $user->password  = bcrypt($request->password);
        $user->phone  = $request->phone;
        $user->city_id  = $request->city_id;

        if ($user->save()) {
            $subscribe = new Subscribe;

            $subscribe->user_id  = $user->id;
            $subscribe->plan_id  = $request->plan_id;
            $subscribe->ordered  = $request->no_meals;
            $subscribe->no_meals  = $request->no_meals;
            $subscribe->total_cost  = $request->total_cost;
            $subscribe->meal_cost  = $request->meal_cost;
            $subscribe->shipping_cost  = $request->shipping_cost;

            $subscribe->save();

            foreach ($request->recipes_id as $recipe_id) {
                $order = new Order;
                $order->recipe_id = $recipe_id;
                $order->user_id = $user->id;
                $order->status = 0; 
                $order->save();
            }
            
            auth()->login($user);

            Session::flash('success', 'Register Sucsessful');
            return "nigga";
        }else{

            Session::flash('error', 'Register Failed');
        }



    }
}
