<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        $active = 'tag';

        $sub_active = 'tag_list';
        
        return view('admin.tags.index', compact(['tags', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'tag';

        $sub_active = 'create_tag';

        return view('admin.tags.create.main', compact(['active', 'sub_active']));
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

        $tag = new Tag;

        $tag->name_en  = $request->name_en;
        $tag->name_ar  = $request->name_ar;
        
        // Shows  message
        if($tag->save()){

            session()->flash('message', 'The tag has been added successfully');
            //Redirect to another page
		    return redirect()->route('tags.index');
        }

        session()->flash('message', 'Error the tag was not added');
        //Redirect to another page
		return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        
        $active = 'tag';

        $sub_active = 'tag_list';

        return view('admin.tags.edit.main', compact(['tag', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $tag->name_en  = $request->name_en;
        $tag->name_ar  = $request->name_ar;

        // Shows  message
        if($tag->save()){

            session()->flash('message', 'The tag has been updated successfully');
            //Redirect to another page
		    return redirect()->route('tags.index');
        }

        session()->flash('message', 'Error the tag was not updated');
        //Redirect to another page
	    return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        
        // Shows .toaster message
        if($tag->delete()){

            session()->flash('message', 'The tag has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('tags.index');
        }

        session()->flash('message', 'Error the tag was not deleted');
        //Redirect to another page
	    return redirect()->route('tags.index');
    }
}
