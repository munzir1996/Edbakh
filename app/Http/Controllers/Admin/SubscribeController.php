<?php

namespace App\Http\Controllers\Admin;

use App\Subscribe;
use App\Plan;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribes = Subscribe::all();

        $active = 'subscribe';

        $sub_active = 'subscribe_list';
        
        return view('admin.subscribes.index', compact(['subscribes', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::all();
        $users = User::all();

        $active = 'subscribe';

        $sub_active = 'create_subscribe';

        return view('admin.subscribes.create.main', compact(['plans', 'users', 'active', 'sub_active']));
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
            'user_id' => 'required',
            'shipping_cost' => 'required',
            'meal_cost' => 'required',
            'total_cost' => 'required',
            'no_meals' => 'required',
            'ordered' => 'required',
        ]);

        $subscribe = new Subscribe;

        $subscribe->plan_id  = $request->plan_id;
        $subscribe->user_id  = $request->user_id;
        $subscribe->shipping_cost  = $request->shipping_cost;
        $subscribe->meal_cost  = $request->meal_cost;
        $subscribe->total_cost  = $request->total_cost;
        $subscribe->no_meals  = $request->no_meals;
        $subscribe->ordered  = $request->ordered;
        
        $checkSubscribe = Subscribe::where('user_id', Auth::user()->id)->get();

        if ($checkSubscribe == null) {
            if($subscribe->save()){

                session()->flash('message', 'The subscribe has been added successfully');
                //Redirect to another page
                return redirect()->route('subscribes.index');
            }
        } else {
            session()->flash('message', 'User already subscribed');
            //Redirect to another page
		    return redirect()->route('subscribes.index');
        }
        
        // Shows  message
        

        session()->flash('message', 'Error the subscribe was not added');
        //Redirect to another page
		return redirect()->route('subscribes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        
        $active = 'subscribe';

        $sub_active = 'subscribe_list';

        return view('admin.subscribes.show', compact(['subscribe', 'active' , 'sub_active']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        $plans = Plan::all();
        $users = User::all();
        
        $active = 'subscribe';

        $sub_active = 'subscribe_list';

        return view('admin.subscribes.edit.main', compact(['plans', 'users', 'subscribe', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscribe = Subscribe::findOrFail($id);

        //validation
        $this->validate($request, [
            'plan_id' => 'required',
            'user_id' => 'required',
            'shipping_cost' => 'required',
            'meal_cost' => 'required',
            'total_cost' => 'required',
            'no_meals' => 'required',
            'ordered' => 'required',
        ]);

        $subscribe->plan_id  = $request->plan_id;
        $subscribe->user_id  = $request->user_id;
        $subscribe->shipping_cost  = $request->shipping_cost;
        $subscribe->meal_cost  = $request->meal_cost;
        $subscribe->total_cost  = $request->total_cost;
        $subscribe->no_meals  = $request->no_meals;
        $subscribe->ordered  = $request->ordered;

        // Shows  message
        if($subscribe->save()){

            session()->flash('message', 'The subscribe has been updated successfully');
            //Redirect to another page
		    return redirect()->route('subscribes.index');
        }

        session()->flash('message', 'Error the subscribe was not updated');
        //Redirect to another page
	    return redirect()->route('subscribes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscribe = Subscribe::findOrFail($id);
        
        // Shows .toaster message
        if($subscribe->delete()){

            session()->flash('message', 'The Subscribe has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('subscribes.index');
        }

        session()->flash('message', 'Error the Subscribe was not deleted');
        //Redirect to another page
	    return redirect()->route('subscribes.index');
    }
}
