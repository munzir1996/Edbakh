<?php

namespace App\Http\Controllers\Admin;

use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();

        $active = 'season';

        $sub_active = 'season_list';
        
        return view('admin.seasons.index', compact(['seasons', 'active', 'sub_active']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'season';

        $sub_active = 'create_season';

        return view('admin.seasons.create.main', compact(['active', 'sub_active']));
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

        $season = new Season;

        $season->name_en  = $request->name_en;
        $season->name_ar  = $request->name_ar;
        
        // Shows  message
        if($season->save()){

            session()->flash('message', 'The main season has been added successfully');
            //Redirect to another page
		    return redirect()->route('seasons.index');
        }

        session()->flash('message', 'Error the main season was not added');
        //Redirect to another page
		return redirect()->route('seasons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $season = Season::findOrFail($id);
        
        $active = 'season';

        $sub_active = 'season_list';

        return view('admin.seasons.edit.main', compact(['season', 'active' , 'sub_active']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $season = Season::findOrFail($id);

        //validation
        $this->validate($request, [
            'name_en' => 'required',
            'name_ar' => 'required',
        ]);

        $season->name_en  = $request->name_en;
        $season->name_ar  = $request->name_ar;

        // Shows  message
        if($season->save()){

            session()->flash('message', 'The season has been updated successfully');
            //Redirect to another page
		    return redirect()->route('seasons.index');
        }

        session()->flash('message', 'Error the season was not updated');
        //Redirect to another page
	    return redirect()->route('seasons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $season = Season::findOrFail($id);
        
        // Shows .toaster message
        if($season->delete()){

            session()->flash('message', 'The season has been deleted successfully');
            //Redirect to another page
		    return redirect()->route('seasons.index');
        }

        session()->flash('message', 'Error the season was not deleted');
        //Redirect to another page
	    return redirect()->route('seasons.index');
    }
}
