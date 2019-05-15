<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        $active = 'city';

        $sub_active = 'city_list';
        
        return view('admin.cities.index', compact(['cities', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'city';

        $sub_active = 'create_city';

        return view('admin.cities.create.main', compact(['active', 'sub_active']));
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
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $city = new City;

        $city->name_en  = $request->name_en;
        $city->name_ar  = $request->name_ar;
        
        // Shows  message
        if($city->save()){

            session()->flash('message', 'The main city has been added successfully');
            //Redirect to another page
		    return redirect()->route('cities.index');
        }

        session()->flash('message', 'Error the main city was not added');
        //Redirect to another page
		return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        
        $active = 'city';

        $sub_active = 'city_list';

        return view('admin.cities.edit.main', compact(['city', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $city->name_en  = $request->name_en;
        $city->name_ar  = $request->name_ar;

        // Shows  message
        if($city->save()){

            session()->flash('message', 'The city has been updated successfully');
            //Redirect to another page
		    return redirect()->route('cities.index');
        }

        session()->flash('message', 'Error the city was not updated');
        //Redirect to another page
	    return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        
        // Shows .toaster message
        if($city->delete()){

            session()->flash('message', 'The city has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('cities.index');
        }

        session()->flash('message', 'Error the city was not deleted');
        //Redirect to another page
	    return redirect()->route('cities.index');
    }
}
