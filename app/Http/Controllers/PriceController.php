<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\setting;
use App\Subscribe;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Faq;
use App\Date;
use App\Recipe;
class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'update','show','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all()->take(6);
        $plans = Plan::all();
        $current = 'pricing';

        // dd($setting);

        return view('pricing.main', compact(['current', 'plans', 'faqs', ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'plan_id' => 'required',
            'recipes_id' => 'required',
            'meal_cost' => 'required',
            'no_meals' => 'required',
            'shipping_cost' => 'required',
            'total_cost' => 'required',
        ]);

        $subscribe = new Subscribe;

        $subscribe->user_id  = Auth::user()->id;
        $subscribe->plan_id  = $request->plan_id;
        $subscribe->ordered  = $request->no_meals;
        $subscribe->no_meals  = $request->no_meals;
        $subscribe->total_cost  = $request->total_cost;
        $subscribe->meal_cost  = $request->meal_cost;
        $subscribe->shipping_cost  = $request->shipping_cost;

        if ($subscribe->save()) {

            foreach ($request->recipes_id as $recipe_id) {
                $order = new Order;
                $order->recipe_id = $recipe_id;
                $order->user_id = Auth::user()->id;
                $order->status = 0; 
                $order->save();
            }
            
            Session::flash('success', 'Subscribed Sucsessful');
        }else{

            Session::flash('error', 'Subscribed Failed');
        }        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipes = Recipe::where('plan_id', $id)->get();
        
        // $dates = Date::all();
        
        return(['recipes' => $recipes,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $subscribes = Subscribe::where('user_id', Auth::user()->id)->get();
        
        if($subscribes == null){
            $recipes = Recipe::where('plan_id', $id)->get();
            $dates = Date::all();
            $planId = $id;
            $meal_cost = $request->meal_cost;
            $no_meals = $request->no_meals;
            $shipping_cost = $request->shipping_cost;
            $total_cost = $request->total_cost;
            
            return view('pricing.show', compact(['recipes', 'dates', 'planId', 'meal_cost', 
            'no_meals', 'shipping_cost', 'total_cost',]));
            // return(['recipes' => $recipes,]);
        }else{
            Session::flash('error', 'Already Subscribed');
            return redirect()->back();
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
