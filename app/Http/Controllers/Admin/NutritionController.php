<?php

namespace App\Http\Controllers\Admin;

use App\Nutrition;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutritions = Nutrition::all();

        $active = 'nutrition';

        $sub_active = 'nutrition_list';
        
        return view('admin.nutritions.index', compact(['nutritions', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'nutrition';

        $sub_active = 'create_nutrition';

        $recipes = Recipe::all();

        return view('admin.nutritions.create.main', compact(['recipes','active', 'sub_active']));
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
            'fats' => 'required',
            'saturated_fats' => 'required',
            'carbohydrate' => 'required',
            'sugar' => 'required',
            'dietary_fiber' => 'required',
            'protein' => 'required',
            'cholestrol' => 'required',
            'sodium' => 'required',
            'recipe_id' => 'required',
        ]);

        $nutrition = new Nutrition;

        $nutrition->fats  = $request->fats;
        $nutrition->saturated_fats  = $request->saturated_fats;
        $nutrition->carbohydrate  = $request->carbohydrate;
        $nutrition->sugar  = $request->sugar;
        $nutrition->dietary_fiber  = $request->dietary_fiber;
        $nutrition->protein  = $request->protein;
        $nutrition->cholestrol  = $request->cholestrol;
        $nutrition->sodium  = $request->sodium;
        $nutrition->recipe_id  = $request->recipe_id;
        
        // Shows  message
        if($nutrition->save()){

            session()->flash('message', 'The Nutrition has been added successfully');
            //Redirect to another page
		    return redirect()->route('nutritions.index');
        }

        session()->flash('message', 'Error the Nutrition was not added');
        //Redirect to another page
		return redirect()->route('nutritions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function show(Nutrition $nutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nutrition = Nutrition::findOrFail($id);
        $recipes = Recipe::all();
        
        $active = 'nutrition';

        $sub_active = 'nutrition_list';

        return view('admin.nutritions.edit.main', compact(['nutrition', 'recipes', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nutrition = Nutrition::findOrFail($id);

        //validation
        $this->validate($request, [
            'fats' => 'required',
            'saturated_fats' => 'required',
            'carbohydrate' => 'required',
            'sugar' => 'required',
            'dietary_fiber' => 'required',
            'protein' => 'required',
            'cholestrol' => 'required',
            'sodium' => 'required',
            'recipe_id' => 'required',
        ]);

        $nutrition->fats  = $request->fats;
        $nutrition->saturated_fats  = $request->saturated_fats;
        $nutrition->carbohydrate  = $request->carbohydrate;
        $nutrition->sugar  = $request->sugar;
        $nutrition->dietary_fiber  = $request->dietary_fiber;
        $nutrition->protein  = $request->protein;
        $nutrition->cholestrol  = $request->cholestrol;
        $nutrition->sodium  = $request->sodium;
        $nutrition->recipe_id  = $request->recipe_id;

        // Shows  message
        if($nutrition->save()){

            session()->flash('message', 'The Nutritions has been updated successfully');
            //Redirect to another page
		    return redirect()->route('nutritions.index');
        }

        session()->flash('message', 'Error the Nutritions was not updated');
        //Redirect to another page
	    return redirect()->route('nutritions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nutrition  $nutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nutrition = Nutrition::findOrFail($id);
        
        // Shows .toaster message
        if($nutrition->delete()){

            session()->flash('message', 'The nutrition has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('nutritions.index');
        }

        session()->flash('message', 'Error the nutrition was not deleted');
        //Redirect to another page
	    return redirect()->route('nutritions.index');
    }
}
