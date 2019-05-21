<?php

namespace App\Http\Controllers\Admin;

use App\Date;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates = Date::all();

        $active = 'date';

        $sub_active = 'date_list';
        
        return view('admin.dates.index', compact(['dates', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans = Plan::all();

        $active = 'date';

        $sub_active = 'create_date';

        return view('admin.dates.create.main', compact(['plans', 'active', 'sub_active']));
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
            'date_en' => 'required',
            'date_ar' => 'required',
            //'plan_id' => 'required',
        ]);

        $date = new Date;

        $date->date_en  = $request->date_en;
        $date->date_ar  = $request->date_ar;
        //$date->plan_id  = $request->plan_id;
        
        // Shows  message
        if($date->save()){

            session()->flash('message', 'The Date has been added successfully');
            //Redirect to another page
		    return redirect()->route('dates.index');
        }

        session()->flash('message', 'Error the Date was not added');
        //Redirect to another page
		return redirect()->route('dates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Date::findOrFail($id);
        //$plans = Plan::all();
        
        $active = 'date';

        $sub_active = 'date_list';

        return view('admin.dates.edit.main', compact([ 'date', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Date::findOrFail($id);

        //validation
        $this->validate($request, [
            'date_en' => 'required',
            'date_ar' => 'required',
            //'plan_id' => 'required',
        ]);

        $date->date_en  = $request->date_en;
        $date->date_ar  = $request->date_ar;
        //$date->plan_id  = $request->plan_id;

        // Shows  message
        if($date->save()){

            session()->flash('message', 'The Date has been updated successfully');
            //Redirect to another page
		    return redirect()->route('dates.index');
        }

        session()->flash('message', 'Error the Date was not updated');
        //Redirect to another page
	    return redirect()->route('dates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date $date)
    {
        $date = Date::findOrFail($id);
        
        // Shows .toaster message
        if($date->delete()){

            session()->flash('message', 'The Date has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('dates.index');
        }

        session()->flash('message', 'Error the Date was not deleted');
        //Redirect to another page
	    return redirect()->route('dates.index');
    }
}
