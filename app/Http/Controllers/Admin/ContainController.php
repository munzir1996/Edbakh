<?php

namespace App\Http\Controllers\Admin;

use App\Contain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Purifier; 
use Image;
use Storage;
use File;

class ContainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contains = Contain::all();

        $active = 'contain';

        $sub_active = 'contain_list';
        
        return view('admin.contains.index', compact(['contains', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'contain';

        $sub_active = 'create_contain';

        return view('admin.contains.create.main', compact(['active', 'sub_active']));
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
            'picture' => 'required',
            'weight_ar' => 'required',
            'weight_en' => 'required',
        ]);

        $contain = new Contain;

        $contain->name_en  = $request->name_en;
        $contain->name_ar  = $request->name_ar;
        $contain->weight_ar  = $request->weight_ar;
        $contain->weight_en  = $request->weight_en;
        //Save our image
        //dd($request);
		if($request->hasFile('picture')){
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            request()->picture->move(public_path('uploads/'), $filename);

            $contain->picture = $filename;
		}
        // Shows  message
        if($contain->save()){

            session()->flash('message', 'The Ingredients has been added successfully');
            //Redirect to another page
		    return redirect()->route('contains.index');
        }

        session()->flash('message', 'Error the Ingredients was not added');
        //Redirect to another page
		return redirect()->route('contains.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contain  $contain
     * @return \Illuminate\Http\Response
     */
    public function show(Contain $contain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contain  $contain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contain = Contain::findOrFail($id);
        
        $active = 'contain';

        $sub_active = 'contain_list';

        return view('admin.contains.edit.main', compact(['contain', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contain  $contain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contain = contain::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
            'picture' => 'required',
            'weight_ar' => 'required',
            'weight_en' => 'required',
        ]);

        $contain->name_en  = $request->name_en;
        $contain->name_ar  = $request->name_ar;
        $contain->weight_ar  = $request->weight_ar;
        $contain->weight_en  = $request->weight_en;

        if($request->hasFile('picture')){
			
			//Add the new photo
			$image = $request->file('picture');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            request()->picture->move(public_path('uploads/'), $filename);

			$oldFilename = $contain->picture;
			
			//Update the database
			$contain->picture = $filename;

            //Delete the image
            File::delete('public/uploads/'.$oldFilename);
		}

        // Shows  message
        if($contain->save()){

            session()->flash('message', 'The Ingredients has been updated successfully');
            //Redirect to another page
		    return redirect()->route('contains.index');
        }

        session()->flash('message', 'Error the Ingredients was not updated');
        //Redirect to another page
	    return redirect()->route('contains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contain  $contain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contain = contain::findOrFail($id);
        
        //Delete image        
        if(File::delete('public/uploads/'.$contain->picture) ){
            $contain->delete();
            session()->flash('message', 'The Ingredients has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('contains.index');
        }

        session()->flash('message', 'Error the Ingredients was not deleted');
        //Redirect to another page
	    return redirect()->route('contains.index');
    }
}
