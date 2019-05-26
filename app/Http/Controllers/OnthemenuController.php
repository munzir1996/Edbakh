<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Nutrition;
use App\Instruction;
use Illuminate\Http\Request;
use App\Plan;
use App\Date;
use App\Subscribe;
use Auth;

class OnthemenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'userIndex']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        $plans = Plan::all();
        $dates = Date::all();
        
        //$subscribes = Subscribe::where('user_id', Auth::user()->id)->get();

        //dd($subscribes);

        $current = 'on_the_menu';
        
        return view('on_the_menu', compact(['recipes', 'dates', 'plans', 'current',]));
    }

    public function userIndex()
    {
        $recipes = Recipe::all();
        //$plans = Plan::all();
        $dates = Date::all();
        
        $subscribes = Subscribe::where('user_id', Auth::user()->id)->get();

        //dd($subscribes);

        $current = 'user_menu';
        
        return view('user_menu', compact(['recipes', 'dates', 'subscribes', 'current',]));
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
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        // $test = $recipe->contains->first();
        // dd($test->pivot->amount);
        $instruction = Instruction::where('recipe_id', $id)->get();

        return view('recipe_opening', compact(['recipe', 'instruction',]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
