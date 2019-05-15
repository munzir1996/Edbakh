<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();

        $active = 'order';

        $sub_active = 'order_list';
        
        return view('admin.orders.index', compact(['orders', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipes = Recipe::all();
        $users = User::all();

        $active = 'order';

        $sub_active = 'create_order';

        return view('admin.orders.create.main', compact(['recipes', 'users', 'active', 'sub_active']));
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
            'recipe_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        $order = new Order;

        $order->recipe_id  = $request->recipe_id;
        $order->user_id  = $request->user_id;
        $order->status  = $request->status;
        
        // Shows  message
        if($order->save()){

            session()->flash('message', 'The order has been added successfully');
            //Redirect to another page
		    return redirect()->route('orders.index');
        }

        session()->flash('message', 'Error the order was not added');
        //Redirect to another page
		return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $recipes = Recipe::all();
        $users = User::all();
        
        $active = 'order';

        $sub_active = 'order_list';

        return view('admin.orders.edit.main', compact(['recipes', 'users', 'order', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        //validation
        $this->validate($request, [
            'recipe_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);

        $order->recipe_id  = $request->recipe_id;
        $order->user_id  = $request->user_id;
        $order->status  = $request->status;

        // Shows  message
        if($order->save()){

            session()->flash('message', 'The order has been updated successfully');
            //Redirect to another page
		    return redirect()->route('orders.index');
        }

        session()->flash('message', 'Error the order was not updated');
        //Redirect to another page
	    return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        
        // Shows .toaster message
        if($order->delete()){

            session()->flash('message', 'The order has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('orders.index');
        }

        session()->flash('message', 'Error the order was not deleted');
        //Redirect to another page
	    return redirect()->route('orders.index');
    }
}
