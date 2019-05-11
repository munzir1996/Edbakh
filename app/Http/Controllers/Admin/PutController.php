<?php

namespace App\Http\Controllers\Admin;

use App\Put;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puts = Put::all();

        $active = 'put';

        $sub_active = 'put_list';
        
        return view('admin.puts.index', compact(['puts', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'put';

        $sub_active = 'create_put';

        return view('admin.puts.create.main', compact(['active', 'sub_active']));
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

        $put = new Put;

        $put->name_en  = $request->name_en;
        $put->name_ar  = $request->name_ar;
        
        // Shows  message
        if($put->save()){

            session()->flash('message', 'The put has been added successfully');
            //Redirect to another page
		    return redirect()->route('puts.index');
        }

        session()->flash('message', 'Error the put was not added');
        //Redirect to another page
		return redirect()->route('puts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Put  $put
     * @return \Illuminate\Http\Response
     */
    public function show(Put $put)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Put  $put
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $put = Put::findOrFail($id);
        
        $active = 'put';

        $sub_active = 'put_list';

        return view('admin.puts.edit.main', compact(['put', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Put  $put
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $put = Put::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $put->name_en  = $request->name_en;
        $put->name_ar  = $request->name_ar;

        // Shows  message
        if($put->save()){

            session()->flash('message', 'The put has been updated successfully');
            //Redirect to another page
		    return redirect()->route('puts.index');
        }

        session()->flash('message', 'Error the put was not updated');
        //Redirect to another page
	    return redirect()->route('puts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Put  $put
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $put = Put::findOrFail($id);
        
        // Shows .toaster message
        if($put->delete()){

            session()->flash('message', 'The put has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('puts.index');
        }

        session()->flash('message', 'Error the put was not deleted');
        //Redirect to another page
	    return redirect()->route('puts.index');
    }
}
