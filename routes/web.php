<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$languages = LaravelLocalization::getSupportedLocales();
foreach ($languages as $language => $values) {
    $supportedLocales[] = $language;
}

$locale = Request::segment(1);
if (in_array($locale, $supportedLocales)) {
    LaravelLocalization::setLocale($locale);
    App::setLocale($locale);
}
// Route::get('/', function () {
//     return redirect('/en/');
// });

 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(array('prefix' => LaravelLocalization::getCurrentLocale()), function () {
    Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');


    // language
        Route::get('language/set-locale/{language}', array('as' => 'admin.language.set','uses' => 'LanguageController@setLocale', ));

    // roles
        Route::get('/roles/{id}/assign', 'rolesController@assign')->name('roles.assign');
        Route::post('/roles/assignpost', 'rolesController@assignpost')->name('roles.assignpost');
        Route::resource('roles', 'rolesController');
    // users
        Route::resource('users', 'usersController');
        Route::resource('privileges', 'privilegesController');
        Route::get('/errors/403', 'rolesController@assign')->name('403');
    // 

    Route::resource('models', 'modelsController');

    Route::get('inventory/warehouses', ['as'=> 'inventory.warehouses.index', 'uses' => 'Inventory\warehousesController@index']);
    Route::post('inventory/warehouses', ['as'=> 'inventory.warehouses.store', 'uses' => 'Inventory\warehousesController@store']);
    Route::get('inventory/warehouses/create', ['as'=> 'inventory.warehouses.create', 'uses' => 'Inventory\warehousesController@create']);
    Route::put('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.update', 'uses' => 'Inventory\warehousesController@update']);
    Route::patch('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.update', 'uses' => 'Inventory\warehousesController@update']);
    Route::delete('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.destroy', 'uses' => 'Inventory\warehousesController@destroy']);
    Route::get('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.show', 'uses' => 'Inventory\warehousesController@show']);
    Route::get('inventory/warehouses/{warehouses}/edit', ['as'=> 'inventory.warehouses.edit', 'uses' => 'Inventory\warehousesController@edit']);
    //
    Route::get('inventory/units', ['as'=> 'inventory.units.index', 'uses' => 'Inventory\unitsController@index']);
Route::post('inventory/units', ['as'=> 'inventory.units.store', 'uses' => 'Inventory\unitsController@store']);
Route::get('inventory/units/create', ['as'=> 'inventory.units.create', 'uses' => 'Inventory\unitsController@create']);
Route::put('inventory/units/{units}', ['as'=> 'inventory.units.update', 'uses' => 'Inventory\unitsController@update']);
Route::patch('inventory/units/{units}', ['as'=> 'inventory.units.update', 'uses' => 'Inventory\unitsController@update']);
Route::delete('inventory/units/{units}', ['as'=> 'inventory.units.destroy', 'uses' => 'Inventory\unitsController@destroy']);
Route::get('inventory/units/{units}', ['as'=> 'inventory.units.show', 'uses' => 'Inventory\unitsController@show']);
Route::get('inventory/units/{units}/edit', ['as'=> 'inventory.units.edit', 'uses' => 'Inventory\unitsController@edit']);

Route::get('inventory/categories', ['as'=> 'inventory.categories.index', 'uses' => 'Inventory\categoriesController@index']);
Route::post('inventory/categories', ['as'=> 'inventory.categories.store', 'uses' => 'Inventory\categoriesController@store']);
Route::get('inventory/categories/create', ['as'=> 'inventory.categories.create', 'uses' => 'Inventory\categoriesController@create']);
Route::put('inventory/categories/{categories}', ['as'=> 'inventory.categories.update', 'uses' => 'Inventory\categoriesController@update']);
Route::patch('inventory/categories/{categories}', ['as'=> 'inventory.categories.update', 'uses' => 'Inventory\categoriesController@update']);
Route::delete('inventory/categories/{categories}', ['as'=> 'inventory.categories.destroy', 'uses' => 'Inventory\categoriesController@destroy']);
Route::get('inventory/categories/{categories}', ['as'=> 'inventory.categories.show', 'uses' => 'Inventory\categoriesController@show']);
Route::get('inventory/categories/{categories}/edit', ['as'=> 'inventory.categories.edit', 'uses' => 'Inventory\categoriesController@edit']);
   });









