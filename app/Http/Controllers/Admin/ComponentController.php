<?php

namespace App\Http\Controllers\Admin;

use App\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::all();

        $active = 'component';

        $sub_active = 'component_list';
        
        return view('admin.components.index', compact(['components', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'component';

        $sub_active = 'create_component';

        return view('admin.components.create.main', compact(['active', 'sub_active']));
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

        $component = new Component;

        $component->name_en  = $request->name_en;
        $component->name_ar  = $request->name_ar;
        
        // Shows  message
        if($component->save()){

            session()->flash('message', 'The main component has been added successfully');
            //Redirect to another page
		    return redirect()->route('components.index');
        }

        session()->flash('message', 'Error the main component was not added');
        //Redirect to another page
		return redirect()->route('components.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Component::findOrFail($id);
        
        $active = 'component';

        $sub_active = 'component_list';

        return view('admin.components.edit.main', compact(['component', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $component = Component::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $component->name_en  = $request->name_en;
        $component->name_ar  = $request->name_ar;

        // Shows  message
        if($component->save()){

            session()->flash('message', 'The component has been updated successfully');
            //Redirect to another page
		    return redirect()->route('components.index');
        }

        session()->flash('message', 'Error the component was not updated');
        //Redirect to another page
	    return redirect()->route('components.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $component = Component::findOrFail($id);
        
        // Shows .toaster message
        if($component->delete()){

            session()->flash('message', 'The component has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('components.index');
        }

        session()->flash('message', 'Error the component was not deleted');
        //Redirect to another page
	    return redirect()->route('components.index');
    }
}
