<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Dish;
use App\Season;
use App\Recipe;

class CookbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();
        $recipes= Recipe::all();
        
        return view('cookbook', compact(['components', 'dishes', 'seasons', 'recipes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Search a recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();

        $recipes = Recipe::where('title_ar', $request->title)->orWhere('title_en', $request->title)->get();
        
        return view('search', compact(['recipes', 'components', 'dishes', 'seasons',]));
        
    }

    /**
     * Search a recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function component($id)
    {
        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();

        $recipes = Recipe::where('component_id', $id)->get();
        
        return view('search', compact(['recipes', 'components', 'dishes', 'seasons',]));
        
    }

    /**
     * Search a recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dish($id)
    {
        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();

        $recipes = Recipe::where('dish_id', $id)->get();
        
        return view('search', compact(['recipes', 'components', 'dishes', 'seasons',]));
        
    }

    /**
     * Search a recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function season($id)
    {
        $components = Component::all();
        $dishes = Dish::all();
        $seasons = Season::all();

        $recipes = Recipe::where('season_id', $id)->get();
        
        return view('search', compact(['recipes', 'components', 'dishes', 'seasons',]));
        
    }
}
