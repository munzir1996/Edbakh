<?php

Route::get('/admin', 'LoginController@loginPage')->name('login');

Route::post('/admin/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');

if (in_array(Request::segment(1), Config::get('app.alt_langs'))) {

    App::setLocale(Request::segment(1));

    Config::set('app.locale_prefix', Request::segment(1));

}

/*foreach(Lang::get('main') as $k => $v) {

    Route::pattern($k, $v);

}*/

Route::get('/', function () {

    return view('index');

});

Route::get('/send/email', 'MailController@mail');

Route::group(array('prefix' => Config::get('app.locale_prefix')), function() {

    Route::get('/', function () {

    return view('index');

    });

    // Route::get('/on_the_menu', function () {

    //     $current = 'on_the_menu';

    //     return view('on_the_menu', compact('current'));

    // });

    Route::get('/how_it_work', function () {

        $current = 'how_it_work';

        return view('how_it_work', compact('current'));

    });

    // Route::get('/pricing', 'Admin\PlanController@client_pricing_page');

    Route::get('/gifts', function () {

        $current = 'gifts';

        return view('gifts', compact('current'));

    });
    //FAQ
    Route::resource('/faq', 'faqController');
    //Cookbook
    Route::resource('/cookbook', 'CookbookController');
    Route::post('/cookbook/search', 'CookbookController@search')->name('cookbook.search');
    Route::get('/cookbook/component/{cookbook}', 'CookbookController@component')->name('cookbook.component');
    Route::get('/cookbook/dish/{cookbook}', 'CookbookController@dish')->name('cookbook.dish');
    Route::get('/cookbook/season/{cookbook}', 'CookbookController@season')->name('cookbook.season');
    //Generate PDF
    Route::get('/generate-pdf/{id}','PdfController@generatePDF');
    //Onthemenu
    Route::resource('/on_the_menu', 'OnthemenuController');
    //Recipe
    Route::resource('/recipe', 'RecipeController');
    //Pricing
    Route::resource('/pricing', 'PriceController');
        
    Route::get('/recipes', function () {

        return view('recipe_opening');

    });

    Route::get('/sign_up', function (){

        return view('sign_up');

    });

    Route::get('/login', function (){

        return view('login');

    });

});