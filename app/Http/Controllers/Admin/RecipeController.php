<?php

namespace App\Http\Controllers\Admin;

use App\Recipe;
use App\Tag;
use App\Put;
use App\Season;
use App\Component;
use App\Contain;
use App\Dish;
use App\Plan;
use App\Date;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Storage;
use File;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();

        $active = 'recipe';

        $sub_active = 'recipe_list';
        
        return view('admin.recipes.index', compact(['recipes', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'recipe';

        $sub_active = 'create_recipe';

        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();
        $tags = Tag::all();
        $puts = Put::all();
        $contains = Contain::all();
        $plans = Plan::all();
        $dates = Date::all();

        return view('admin.recipes.create.main', 
        compact(['components', 'dishes', 'dates', 'seasons', 'tags', 'puts', 'contains', 'plans', 
        'active', 'sub_active']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'title_ar' => 'required',
            'subtitle_ar' => 'required',
            'title_en' => 'required',
            'subtitle_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'time' => 'required',
            'level' => 'required',
            'calories' => 'required|integer',
            'picture' => 'required|image',
            'component_id' => 'required|integer',
            'dish_id' => 'required|integer',
            'season_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'date_id' => 'required|integer',
        ]);

        // dd($request);

        $recipe = new Recipe;

        $recipe->title_ar  = $request->title_ar;
        $recipe->subtitle_ar  = $request->subtitle_ar;
        $recipe->title_en  = $request->title_en;
        $recipe->subtitle_en  = $request->subtitle_en;
        $recipe->description_ar  = $request->description_ar;
        $recipe->description_en  = $request->description_en;
        $recipe->time  = $request->time;
        $recipe->level  = $request->level;
        $recipe->calories  = $request->calories;
        $recipe->component_id  = $request->component_id;
        $recipe->dish_id  = $request->dish_id;
        $recipe->season_id  = $request->season_id;
        $recipe->plan_id  = $request->plan_id;
        $recipe->date_id  = $request->date_id;

        //Save our image
		if($request->hasFile('picture')){
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->picture->move(public_path('uploads/'), $filename);
			$location = public_path('uploads/' . $filename);
            Image::make($image)->resize(370, 247)->save($location);
			
			$recipe->picture = $filename;
		}
        	
        // Shows  message
        if($recipe->save()){
            $recipe->puts()->sync($request->puts, false);
            $recipe->tags()->sync($request->tags, false);

            // $id=0;
             foreach ($request->contains as $index => $contain) {
                 if ($request->amounts[$index] != null) {
                     $recipe->contains()->attach($contain, ['amount'=> $request->amounts[$index], 
                                                            'include'=> $request->includes[$index]]);
                     # code...
                 }
                // $id++;
                
            }
                
            session()->flash('message', 'The Recipe has been added successfully');
            //Redirect to another page
		    return redirect()->route('recipes.index');
        }

        session()->flash('message', 'Error the Recipe was not added');
        //Redirect to another page
		return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();

        $tags = Tag::all();

        $puts = Put::all();
        $contains = Contain::all();
        $plans = Plan::all();
        $dates = Date::all();

        $active = 'recipe';

        $sub_active = 'recipe_list';

        return view('admin.recipes.edit.main', 
        compact(['recipe', 'components', 'dishes', 'tags', 'puts', 'seasons', 'plans', 
        'contains', 'dates', 'active' , 'sub_active']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        //validation
        $this->validate($request, [
            'title_ar' => 'required',
            'subtitle_ar' => 'required',
            'title_en' => 'required',
            'subtitle_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'time' => 'required',
            'level' => 'required',
            'calories' => 'required|integer',
            'picture' => 'sometimes',
            'component_id' => 'required|integer',
            'dish_id' => 'required|integer',
            'season_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'date_id' => 'required|integer',
        ]);

        $recipe->title_ar  = $request->title_ar;
        $recipe->subtitle_ar  = $request->subtitle_ar;
        $recipe->title_en  = $request->title_en;
        $recipe->subtitle_en  = $request->subtitle_en;
        $recipe->description_ar  = $request->description_ar;
        $recipe->description_en  = $request->description_en;
        $recipe->time  = $request->time;
        $recipe->level  = $request->level;
        $recipe->calories  = $request->calories;
        $recipe->component_id  = $request->component_id;
        $recipe->dish_id  = $request->dish_id;
        $recipe->season_id  = $request->season_id;
        $recipe->plan_id  = $request->plan_id;
        $recipe->date_id  = $request->date_id;

        if($request->hasFile('picture')){
			
			//Add the new photo
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
     
            $location = public_path('uploads/' . $filename);
            Image::make($image)->resize(370, 247)->save($location);

            $oldFilename = $recipe->picture;
			
			//Update the database
			$recipe->picture = $filename;
   
            //Delete the image
            File::delete('public/uploads/'.$oldFilename);
		}

        // Shows  message
        if($recipe->save()){

            if (isset($request->tags)) {
                $recipe->tags()->sync($request->tags);
            } else {
                $recipe->tags()->sync(array());
            }
            if (isset($request->puts)) {
                $recipe->puts()->sync($request->puts);
            } else {
                $recipe->puts()->sync(array());
            }
            if (isset($request->contains)) {
                
                //dd($request->contains);

                $recipe->contains()->sync(array());

                foreach ($request->contains as $index => $contain) {
                    $recipe->contains()->attach($contain, ['amount'=> $request->amounts[$index], 
                                                            'include'=> $request->includes[$index]]);
                                     
                }
            } else {
                $recipe->contains()->sync(array());
            }

            session()->flash('message', 'The Recipe has been updated successfully');
            //Redirect to another page
		    return redirect()->route('recipes.index');
        }

        session()->flash('message', 'Error the Recipe was not updated');
        //Redirect to another page
	    return redirect()->route('recipes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
       
        File::delete('public/uploads/'.$recipe->picture);
        
        // Shows .toaster message
        if($recipe->delete()){
            $recipe->tags()->detach();
            $recipe->puts()->detach();
            $recipe->contains()->detach();

            session()->flash('message', 'The Recipe has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('recipes.index');
        }

        session()->flash('message', 'Error the Recipe was not deleted');
        //Redirect to another page
	    return redirect()->route('recipes.index');
    }
}
