<?php


Route::post('/register', 'RegisterController@user');

Route::get('/admin', 'Auth\AdminLoginController@loginPage')->name('login');
Route::post('/admin/login', 'Auth\AdminLoginController@login');

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/logout', 'Auth\AdminLoginController@logout');
    
    Route::get('/home', function(){
    
        $active = 'home';
    
        return view('admin.index', compact('active'));
    
    })->name('admin');
    
    Route::get('/faq', function(){
    
        $active = 'faq';
    
        return view('admin.faqs.index', compact('active'));
    
    });
    //FAQ
    Route::resource('/questions', 'Admin\FaqController');
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
    //Cities
    Route::resource('/cities', 'Admin\CityController');
    
    Route::get('/plans/trash', 'Admin\PlanController@trash');
    
    Route::get('/plans/{id}/send_to_trash', 'Admin\PlanController@send_to_trash');
    Route::get('/plans/{id}/remove_form_trash', 'Admin\PlanController@remove_from_trash');
    
    Route::resource('users', 'Admin\UserController');
    Route::resource('settings', 'Admin\SettingController');
    Route::resource('plans', 'Admin\PlanController');
    });


//  Route::get('/admin', 'LoginController@loginPage')->name('login');

//  Route::post('/admin/login', 'LoginController@login');

Route::post('login', 'LoginController@login')->name('login');
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
    Route::resource('/faq', 'FaqController');
    //How_it_work
    Route::resource('/how_it_work', 'HowController');
    //Cookbook
    Route::resource('/cookbook', 'CookbookController');
    Route::post('/cookbook/search', 'CookbookController@search')->name('cookbook.search');
    Route::get('/cookbook/component/{cookbook}', 'CookbookController@component')->name('cookbook.component');
    Route::get('/cookbook/dish/{cookbook}', 'CookbookController@dish')->name('cookbook.dish');
    Route::get('/cookbook/season/{cookbook}', 'CookbookController@season')->name('cookbook.season');
    //Generate PDF
    Route::get('/generate-pdf','PdfController@generatePDF');
    //Onthemenu
    Route::resource('/on_the_menu', 'OnthemenuController');
    Route::get('/user/on_the_menu', 'OnthemenuController@userIndex');
    //Recipe
    Route::resource('/recipe', 'RecipeController');
    //Pricing
    Route::resource('/pricing', 'PriceController');
    
    Route::get('/recipes', function () {
        
        return view('recipe_opening');

    });


    Route::get('/sign_up', 'Auth\RegisterController@index');
    Route::get('/sign_up/recipes/{id}', 'Auth\RegisterController@recipes');
    
    Route::get('/login', function (){
        
        return view('login');
        
    });

    //Route::auth();
});