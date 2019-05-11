<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();

        $active = 'dish';

        $sub_active = 'dish_list';
        
        return view('admin.dishes.index', compact(['dishes', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'dish';

        $sub_active = 'create_dish';

        return view('admin.dishes.create.main', compact(['active', 'sub_active']));
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

        $dish = new Dish;

        $dish->name_en  = $request->name_en;
        $dish->name_ar  = $request->name_ar;
        
        // Shows  message
        if($dish->save()){

            session()->flash('message', 'The main dish has been added successfully');
            //Redirect to another page
		    return redirect()->route('dishes.index');
        }

        session()->flash('message', 'Error the main dish was not added');
        //Redirect to another page
		return redirect()->route('dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = dish::findOrFail($id);
        
        $active = 'dish';

        $sub_active = 'dish_list';

        return view('admin.dishes.edit.main', compact(['dish', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dish = Dish::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $dish->name_en  = $request->name_en;
        $dish->name_ar  = $request->name_ar;

        // Shows  message
        if($dish->save()){

            session()->flash('message', 'The dish has been updated successfully');
            //Redirect to another page
		    return redirect()->route('dishes.index');
        }

        session()->flash('message', 'Error the dish was not updated');
        //Redirect to another page
	    return redirect()->route('dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        
        // Shows .toaster message
        if($dish->delete()){

            session()->flash('message', 'The dish has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('dishes.index');
        }

        session()->flash('message', 'Error the dish was not deleted');
        //Redirect to another page
	    return redirect()->route('dishes.index');
    }
}
