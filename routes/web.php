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
        Route::get('settings/roles/{id}/assign', ['as'=> 'settings.roles.assign', 'uses' => 'rolesController@assign']);
        Route::post('settings/roles/assignpost', ['as'=> 'settings.roles.assignpost', 'uses' => 'rolesController@assignpost']);
        Route::get('settings/roles', ['as'=> 'settings.roles.index', 'uses' => 'rolesController@index']);
        Route::post('settings/roles', ['as'=> 'settings.roles.store', 'uses' => 'rolesController@store']);
        Route::get('settings/roles/create', ['as'=> 'settings.roles.create', 'uses' => 'rolesController@create']);
        Route::put('settings/roles/{roles}', ['as'=> 'settings.roles.update', 'uses' => 'rolesController@update']);
        Route::patch('settings/roles/{roles}', ['as'=> 'settings.roles.update', 'uses' => 'rolesController@update']);
        Route::delete('settings/roles/{roles}', ['as'=> 'settings.roles.destroy', 'uses' => 'rolesController@destroy']);
        Route::get('settings/roles/{roles}', ['as'=> 'settings.roles.show', 'uses' => 'rolesController@show']);
        Route::get('settings/roles/{roles}/edit', ['as'=> 'settings.roles.edit', 'uses' => 'rolesController@edit']);
    
    
        // users
        Route::get('settings/users', ['as'=> 'settings.users.index', 'uses' => 'usersController@index']);
        Route::post('settings/users', ['as'=> 'settings.users.store', 'uses' => 'usersController@store']);
        Route::get('settings/users/create', ['as'=> 'settings.users.create', 'uses' => 'usersController@create']);
        Route::put('settings/users/{users}', ['as'=> 'settings.users.update', 'uses' => 'usersController@update']);
        Route::patch('settings/users/{users}', ['as'=> 'settings.users.update', 'uses' => 'usersController@update']);
        Route::delete('settings/users/{users}', ['as'=> 'settings.users.destroy', 'uses' => 'usersController@destroy']);
        Route::get('settings/users/{users}', ['as'=> 'settings.users.show', 'uses' => 'usersController@show']);
        Route::get('settings/users/{users}/edit', ['as'=> 'settings.users.edit', 'uses' => 'usersController@edit']);
    






        Route::resource('privileges', 'privilegesController');
        Route::get('/errors/403', 'rolesController@assign')->name('403');
    // 
//models
   // Route::resource('settings/models', 'modelsController');

    Route::get('settings/models', ['as'=> 'settings.models.index', 'uses' => 'modelsController@index']);
    Route::post('settings/models', ['as'=> 'settings.models.store', 'uses' => 'modelsController@store']);
    Route::get('settings/models/create', ['as'=> 'settings.models.create', 'uses' => 'modelsController@create']);
    Route::put('settings/models/{models}', ['as'=> 'settings.models.update', 'uses' => 'modelsController@update']);
    Route::patch('settings/models/{models}', ['as'=> 'settings.models.update', 'uses' => 'modelsController@update']);
    Route::delete('settings/models/{models}', ['as'=> 'settings.models.destroy', 'uses' => 'modelsController@destroy']);
    Route::get('settings/models/{models}', ['as'=> 'settings.models.show', 'uses' => 'modelsController@show']);
    Route::get('settings/models/{models}/edit', ['as'=> 'settings.models.edit', 'uses' => 'modelsController@edit']);





//warehouses
    Route::get('inventory/warehouses', ['as'=> 'inventory.warehouses.index', 'uses' => 'Inventory\warehousesController@index']);
    Route::post('inventory/warehouses', ['as'=> 'inventory.warehouses.store', 'uses' => 'Inventory\warehousesController@store']);
    Route::get('inventory/warehouses/create', ['as'=> 'inventory.warehouses.create', 'uses' => 'Inventory\warehousesController@create']);
    Route::put('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.update', 'uses' => 'Inventory\warehousesController@update']);
    Route::patch('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.update', 'uses' => 'Inventory\warehousesController@update']);
    Route::delete('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.destroy', 'uses' => 'Inventory\warehousesController@destroy']);
    Route::get('inventory/warehouses/{warehouses}', ['as'=> 'inventory.warehouses.show', 'uses' => 'Inventory\warehousesController@show']);
    Route::get('inventory/warehouses/{warehouses}/edit', ['as'=> 'inventory.warehouses.edit', 'uses' => 'Inventory\warehousesController@edit']);
    //units
    Route::get('inventory/units', ['as'=> 'inventory.units.index', 'uses' => 'Inventory\unitsController@index']);
Route::post('inventory/units', ['as'=> 'inventory.units.store', 'uses' => 'Inventory\unitsController@store']);
Route::get('inventory/units/create', ['as'=> 'inventory.units.create', 'uses' => 'Inventory\unitsController@create']);
Route::put('inventory/units/{units}', ['as'=> 'inventory.units.update', 'uses' => 'Inventory\unitsController@update']);
Route::patch('inventory/units/{units}', ['as'=> 'inventory.units.update', 'uses' => 'Inventory\unitsController@update']);
Route::delete('inventory/units/{units}', ['as'=> 'inventory.units.destroy', 'uses' => 'Inventory\unitsController@destroy']);
Route::get('inventory/units/{units}', ['as'=> 'inventory.units.show', 'uses' => 'Inventory\unitsController@show']);
Route::get('inventory/units/{units}/edit', ['as'=> 'inventory.units.edit', 'uses' => 'Inventory\unitsController@edit']);
//categories
Route::get('inventory/categories', ['as'=> 'inventory.categories.index', 'uses' => 'Inventory\categoriesController@index']);
Route::post('inventory/categories', ['as'=> 'inventory.categories.store', 'uses' => 'Inventory\categoriesController@store']);
Route::get('inventory/categories/create', ['as'=> 'inventory.categories.create', 'uses' => 'Inventory\categoriesController@create']);
Route::put('inventory/categories/{categories}', ['as'=> 'inventory.categories.update', 'uses' => 'Inventory\categoriesController@update']);
Route::patch('inventory/categories/{categories}', ['as'=> 'inventory.categories.update', 'uses' => 'Inventory\categoriesController@update']);
Route::delete('inventory/categories/{categories}', ['as'=> 'inventory.categories.destroy', 'uses' => 'Inventory\categoriesController@destroy']);
Route::get('inventory/categories/{categories}', ['as'=> 'inventory.categories.show', 'uses' => 'Inventory\categoriesController@show']);
Route::get('inventory/categories/{categories}/edit', ['as'=> 'inventory.categories.edit', 'uses' => 'Inventory\categoriesController@edit']);

//items
Route::get('inventory/items', ['as'=> 'inventory.items.index', 'uses' => 'Inventory\itemsController@index']);
Route::post('inventory/items', ['as'=> 'inventory.items.store', 'uses' => 'Inventory\itemsController@store']);
Route::get('inventory/items/create', ['as'=> 'inventory.items.create', 'uses' => 'Inventory\itemsController@create']);
Route::put('inventory/items/{items}', ['as'=> 'inventory.items.update', 'uses' => 'Inventory\itemsController@update']);
Route::patch('inventory/items/{items}', ['as'=> 'inventory.items.update', 'uses' => 'Inventory\itemsController@update']);
Route::delete('inventory/items/{items}', ['as'=> 'inventory.items.destroy', 'uses' => 'Inventory\itemsController@destroy']);
Route::get('inventory/items/{items}', ['as'=> 'inventory.items.show', 'uses' => 'Inventory\itemsController@show']);
Route::get('inventory/items/{items}/edit', ['as'=> 'inventory.items.edit', 'uses' => 'Inventory\itemsController@edit']);
//transfer 

Route::get('inventory/transfers', ['as'=> 'inventory.transfers.index', 'uses' => 'Inventory\transferController@index']);
Route::post('inventory/transfers', ['as'=> 'inventory.transfers.store', 'uses' => 'Inventory\transferController@store']);
Route::get('inventory/transfers/create', ['as'=> 'inventory.transfers.create', 'uses' => 'Inventory\transferController@create']);
Route::put('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::patch('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::delete('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.destroy', 'uses' => 'Inventory\transferController@destroy']);
Route::get('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.show', 'uses' => 'Inventory\transferController@show']);
Route::get('inventory/transfers/{transfers}/edit', ['as'=> 'inventory.transfers.edit', 'uses' => 'Inventory\transferController@edit']);
<<<<<<< HEAD
// stock details

Route::post('/inventory/stockDetails/store', 'Inventory\StockDetailsController@store');
Route::get('inventory/stockDetails', ['as'=> 'inventory.stock_details.index', 'uses' => 'Inventory\StockDetailsController@index']);
Route::post('inventory/stockDetails', ['as'=> 'inventory.stock_details.store', 'uses' => 'Inventory\StockDetailsController@store']);
Route::get('inventory/stockDetails/create', ['as'=> 'inventory.stock_details.create', 'uses' => 'Inventory\StockDetailsController@create']);
Route::put('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.update', 'uses' => 'Inventory\StockDetailsController@update']);
Route::patch('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.update', 'uses' => 'Inventory\StockDetailsController@update']);
Route::delete('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.destroy', 'uses' => 'Inventory\StockDetailsController@destroy']);
Route::get('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.show', 'uses' => 'Inventory\StockDetailsController@show']);
Route::get('inventory/stockDetails/{stockDetails}/edit', ['as'=> 'inventory.stock_details.edit', 'uses' => 'Inventory\StockDetailsController@edit']);
Route::get('/inventory/stockDetails/print/{id}', 'Inventory\StockDetailsController@print');
// get item qty from stock 
Route::get('/inventory/transfers/getitem_qty/{item_id}/{from_warehouse_id}', 'Inventory\transferController@getitem_qty');
Route::post('/inventory/transfers/Dotransfer', 'Inventory\transferController@Dotransfer');
Route::get('/inventory/transfers/Print/{id}', 'Inventory\transferController@Print');
//inventory transaction
Route::get('inventory/inventoryTransactions', ['as'=> 'inventory.inventory_transactions.index', 'uses' => 'Inventory\InventoryTransactionsController@index']);
Route::post('inventory/inventoryTransactions', ['as'=> 'inventory.inventory_transactions.store', 'uses' => 'Inventory\InventoryTransactionsController@store']);
Route::get('inventory/inventoryTransactions/create', ['as'=> 'inventory.inventory_transactions.create', 'uses' => 'Inventory\InventoryTransactionsController@create']);
Route::put('inventory/inventoryTransactions/{inventoryTransactions}', ['as'=> 'inventory.inventory_transactions.update', 'uses' => 'Inventory\InventoryTransactionsController@update']);
Route::patch('inventory/inventoryTransactions/{inventoryTransactions}', ['as'=> 'inventory.inventory_transactions.update', 'uses' => 'Inventory\InventoryTransactionsController@update']);
Route::delete('inventory/inventoryTransactions/{inventoryTransactions}', ['as'=> 'inventory.inventory_transactions.destroy', 'uses' => 'Inventory\InventoryTransactionsController@destroy']);
Route::get('inventory/inventoryTransactions/{inventoryTransactions}', ['as'=> 'inventory.inventory_transactions.show', 'uses' => 'Inventory\InventoryTransactionsController@show']);
Route::get('inventory/inventoryTransactions/{inventoryTransactions}/edit', ['as'=> 'inventory.inventory_transactions.edit', 'uses' => 'Inventory\InventoryTransactionsController@edit']);

//inventory movementDetails
Route::get('inventory/movementDetails', ['as'=> 'inventory.movementDetails.index', 'uses' => 'Inventory\movementDetailsController@index']);
Route::post('inventory/movementDetails', ['as'=> 'inventory.movementDetails.store', 'uses' => 'Inventory\movementDetailsController@store']);
Route::get('inventory/movementDetails/create', ['as'=> 'inventory.movementDetails.create', 'uses' => 'Inventory\movementDetailsController@create']);
Route::put('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movementDetails.update', 'uses' => 'Inventory\movementDetailsController@update']);
Route::patch('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movementDetails.update', 'uses' => 'Inventory\movementDetailsController@update']);
Route::delete('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movementDetails.destroy', 'uses' => 'Inventory\movementDetailsController@destroy']);
Route::get('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movementDetails.show', 'uses' => 'Inventory\movementDetailsController@show']);
Route::get('inventory/movementDetails/{movementDetails}/edit', ['as'=> 'inventory.movementDetails.edit', 'uses' => 'Inventory\movementDetailsController@edit']);
   });
=======
 
});
>>>>>>> 7fa6b7f40f411bd0d569ab84f8c5a85c8e0619c2




















