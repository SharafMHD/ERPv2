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
//

Route::get('inventory/transfers', ['as'=> 'inventory.transfers.index', 'uses' => 'Inventory\transferController@index']);
Route::post('inventory/transfers', ['as'=> 'inventory.transfers.store', 'uses' => 'Inventory\transferController@store']);
Route::get('inventory/transfers/create', ['as'=> 'inventory.transfers.create', 'uses' => 'Inventory\transferController@create']);
Route::put('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::patch('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::delete('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.destroy', 'uses' => 'Inventory\transferController@destroy']);
Route::get('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.show', 'uses' => 'Inventory\transferController@show']);
Route::get('inventory/transfers/{transfers}/edit', ['as'=> 'inventory.transfers.edit', 'uses' => 'Inventory\transferController@edit']);
//

Route::get('accounting/accountTransactions', ['as'=> 'accounting.accountTransactions.index', 'uses' => 'Accounting\Account_transactionsController@index']);
Route::post('accounting/accountTransactions', ['as'=> 'accounting.accountTransactions.store', 'uses' => 'Accounting\Account_transactionsController@store']);
Route::get('accounting/accountTransactions/create', ['as'=> 'accounting.accountTransactions.create', 'uses' => 'Accounting\Account_transactionsController@create']);
Route::put('accounting/accountTransactions/{accountTransactions}', ['as'=> 'accounting.accountTransactions.update', 'uses' => 'Accounting\Account_transactionsController@update']);
Route::patch('accounting/accountTransactions/{accountTransactions}', ['as'=> 'accounting.accountTransactions.update', 'uses' => 'Accounting\Account_transactionsController@update']);
Route::delete('accounting/accountTransactions/{accountTransactions}', ['as'=> 'accounting.accountTransactions.destroy', 'uses' => 'Accounting\Account_transactionsController@destroy']);
Route::get('accounting/accountTransactions/{accountTransactions}', ['as'=> 'accounting.accountTransactions.show', 'uses' => 'Accounting\Account_transactionsController@show']);
Route::get('accounting/accountTransactions/{accountTransactions}/edit', ['as'=> 'accounting.accountTransactions.edit', 'uses' => 'Accounting\Account_transactionsController@edit']);
// accounting 
Route::get('accounting/accounts', ['as'=> 'accounting.accounts.index', 'uses' => 'Accounting\accountsController@index']);
Route::post('accounting/accounts', ['as'=> 'accounting.accounts.store', 'uses' => 'Accounting\accountsController@store']);
Route::get('accounting/accounts/create', ['as'=> 'accounting.accounts.create', 'uses' => 'Accounting\accountsController@create']);
Route::put('accounting/accounts/{accounts}', ['as'=> 'accounting.accounts.update', 'uses' => 'Accounting\accountsController@update']);
Route::patch('accounting/accounts/{accounts}', ['as'=> 'accounting.accounts.update', 'uses' => 'Accounting\accountsController@update']);
Route::delete('accounting/accounts/{accounts}', ['as'=> 'accounting.accounts.destroy', 'uses' => 'Accounting\accountsController@destroy']);
Route::get('accounting/accounts/{accounts}', ['as'=> 'accounting.accounts.show', 'uses' => 'Accounting\accountsController@show']);
Route::get('accounting/accounts/{accounts}/edit', ['as'=> 'accounting.accounts.edit', 'uses' => 'Accounting\accountsController@edit']);  

Route::get('accounting/transactions', ['as'=> 'accounting.transactions.index', 'uses' => 'Accounting\transactionsController@index']);
Route::post('accounting/transactions', ['as'=> 'accounting.transactions.store', 'uses' => 'Accounting\transactionsController@store']);
Route::get('accounting/transactions/create', ['as'=> 'accounting.transactions.create', 'uses' => 'Accounting\transactionsController@create']);
Route::put('accounting/transactions/{transactions}', ['as'=> 'accounting.transactions.update', 'uses' => 'Accounting\transactionsController@update']);
Route::patch('accounting/transactions/{transactions}', ['as'=> 'accounting.transactions.update', 'uses' => 'Accounting\transactionsController@update']);
Route::delete('accounting/transactions/{transactions}', ['as'=> 'accounting.transactions.destroy', 'uses' => 'Accounting\transactionsController@destroy']);
Route::get('accounting/transactions/{transactions}', ['as'=> 'accounting.transactions.show', 'uses' => 'Accounting\transactionsController@show']);
Route::get('accounting/transactions/{transactions}/edit', ['as'=> 'accounting.transactions.edit', 'uses' => 'Accounting\transactionsController@edit']);

///Deposit
Route::get('accounting/deposits', ['as'=> 'accounting.deposits.index', 'uses' => 'Accounting\depositController@index']);
Route::post('accounting/deposits', ['as'=> 'accounting.deposits.store', 'uses' => 'Accounting\depositController@store']);
Route::get('accounting/deposits/create', ['as'=> 'accounting.deposits.create', 'uses' => 'Accounting\depositController@create']);
Route::put('accounting/deposits/{deposits}', ['as'=> 'accounting.deposits.update', 'uses' => 'Accounting\depositController@update']);
Route::patch('accounting/deposits/{deposits}', ['as'=> 'accounting.deposits.update', 'uses' => 'Accounting\depositController@update']);
Route::delete('accounting/deposits/{deposits}', ['as'=> 'accounting.deposits.destroy', 'uses' => 'Accounting\depositController@destroy']);
Route::get('accounting/deposits/{deposits}', ['as'=> 'accounting.deposits.show', 'uses' => 'Accounting\depositController@show']);
Route::get('accounting/deposits/{deposits}/edit', ['as'=> 'accounting.deposits.edit', 'uses' => 'Accounting\depositController@edit']);

});










