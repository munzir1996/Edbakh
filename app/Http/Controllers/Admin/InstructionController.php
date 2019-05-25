<?php

namespace App\Http\Controllers\Admin;

use App\Instruction;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Storage;
use File;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Instructions = Instruction::all();

        $active = 'Instruction';

        $sub_active = 'Instruction_list';
        
        return view('admin.instructions.index', compact(['Instructions', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'instruuction';

        $sub_active = 'create_instruuction';

        $recipes = Recipe::all();

        return view('admin.instructions.create.main', compact(['recipes','active', 'sub_active']));
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
            'step' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
            'title_en' => 'required',
            'description_en' => 'required',
            'recipe_id' => 'required',
            'picture' => 'required',
        ]);

        $instruction = new Instruction;

        $instruction->step  = $request->step;
        $instruction->title_ar  = $request->title_ar;
        $instruction->description_ar  = $request->description_ar;
        $instruction->title_en  = $request->title_en;
        $instruction->description_en  = $request->description_en;
        $instruction->recipe_id  = $request->recipe_id;
        
        //Save our image
		if($request->hasFile('picture')){
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            //request()->picture->move(public_path('uploads/'), $filename);
			$location = public_path('uploads/' . $filename);
            Image::make($image)->resize(582, 389)->save($location);
			
			$instruction->picture = $filename;
        }
        
        // Shows  message
        if($instruction->save()){

            session()->flash('message', 'The Instruction has been added successfully');
            //Redirect to another page
		    return redirect()->route('instructions.index');
        }

        session()->flash('message', 'Error the Instruction was not added');
        //Redirect to another page
		return redirect()->route('instructions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function show(Instruction $instruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instruction = Instruction::findOrFail($id);
        $recipes = Recipe::all();
        
        $active = 'instruction';

        $sub_active = 'Instruction_list';

        return view('admin.instructions.edit.main', compact(['instruction', 'recipes', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $instruction = instruction::findOrFail($id);

        //validation
        $this->validate($request, [
            'step' => 'required',
            'title_ar' => 'required',
            'description_ar' => 'required',
            'title_en' => 'required',
            'description_en' => 'required',
        ]);

        $instruction->step  = $request->step;
        $instruction->title_ar  = $request->title_ar;
        $instruction->description_ar  = $request->description_ar;
        $instruction->title_en  = $request->title_en;
        $instruction->description_en  = $request->description_en;

        if($request->hasFile('picture')){
			
			//Add the new photo
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            // request()->picture->move(public_path('uploads/'), $filename);
            $location = public_path('uploads/' . $filename);
            Image::make($image)->resize(582, 389)->save($location);

            $oldFilename = $instruction->picture;
			
			//Update the database
			$instruction->picture = $filename;
   
            //Delete the image
            File::delete('public/uploads/'.$oldFilename);
        }
        
        // Shows  message
        if($instruction->save()){

            session()->flash('message', 'The Instructions has been updated successfully');
            //Redirect to another page
		    return redirect()->route('instructions.index');
        }

        session()->flash('message', 'Error the Instructions was not updated');
        //Redirect to another page
	    return redirect()->route('instructions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instruction = Instruction::findOrFail($id);

        File::delete('public/uploads/'.$instruction->picture);
        
        // Shows .toaster message
        if($instruction->delete()){

            session()->flash('message', 'The Instruction has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('instructions.index');
        }

        session()->flash('message', 'Error the instruction was not deleted');
        //Redirect to another page
	    return redirect()->route('instructions.index');
    }
}
