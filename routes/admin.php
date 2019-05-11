<?php

Route::get('/logout', 'LoginController@logout');

Route::get('/home', function(){

    $active = 'home';

    return view('admin.index', compact('active'));

});

Route::get('/faq', function(){

    $active = 'faq';

    return view('admin.faqs.index', compact('active'));

});
//FAQ
Route::resource('/faq', 'Admin\FaqController');
//Component
Route::resource('/components', 'Admin\ComponentController');
//Dishes
Route::resource('/dishes', 'Admin\DishController');
//Seasons
Route::resource('/seasons', 'Admin\SeasonController');
//Tags
Route::resource('/tags', 'Admin\TagController');
//Puts
Route::resource('/puts', 'Admin\PutController');
//Contains
Route::resource('/contains', 'Admin\ContainController');
//Recipes
Route::resource('/recipes', 'Admin\RecipeController');
//Nutritions
Route::resource('/nutritions', 'Admin\NutritionController');
//Instructions
Route::resource('/instructions', 'Admin\InstructionController');
//Dates
Route::resource('/dates', 'Admin\DateController');
//Subscribes
Route::resource('/subscribes', 'Admin\SubscribeController');
//Orders
Route::resource('/orders', 'Admin\OrderController');

Route::get('/plans/trash', 'Admin\PlanController@trash');

Route::get('/plans/{id}/send_to_trash', 'Admin\PlanController@send_to_trash');
Route::get('/plans/{id}/remove_form_trash', 'Admin\PlanController@remove_from_trash');

Route::resource('users', 'UserController');
Route::resource('settings', 'Admin\SettingController');
Route::resource('plans', 'Admin\PlanController');




