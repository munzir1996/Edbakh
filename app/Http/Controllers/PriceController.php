<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\setting;
use App\Subscribe;
use Auth;
use Illuminate\Http\Request;
use Session;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        $current = 'pricing';

        // dd($setting);

        return view('pricing.main', compact(['current', 'plans',]));
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
        //dd($request);
        $this->validate($request, [
            'plan_id' => 'required',
            'no_meals' => 'required',
            'total_cost' => 'required',
            'meal_cost' => 'required',
            'shipping_cost' => 'required',
        ]);

        $status = Subscribe::where('plan_id', $request->plan_id)->first();

        if ($status === null) {
            $subscribe = new Subscribe;

            $subscribe->user_id  = Auth::user()->id;
            $subscribe->plan_id  = $request->plan_id;
            $subscribe->ordered  = Subscribe::ZERO;
            $subscribe->no_meals  = $request->no_meals;
            $subscribe->total_cost  = $request->total_cost;
            $subscribe->meal_cost  = $request->meal_cost;
            $subscribe->shipping_cost  = $request->shipping_cost;
            
            // Shows  message
            if($subscribe->save()){
                Session::flash('success', 'Subscribed Sucsessful');
                return($request);
            }else {

                Session::flash('error', 'Subscribe Failed');
                return($request);
            }
        } else {
                Session::flash('error', 'You are Subscribed');
        }
        

        // dd($status);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
