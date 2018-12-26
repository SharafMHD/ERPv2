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
Route::post('inventory//inventory/stockDetails/print/', ['as'=> 'inventory.transfers.store', 'uses' => 'Inventory\transferController@store']);
Route::get('inventory/transfers/create', ['as'=> 'inventory.transfers.create', 'uses' => 'Inventory\transferController@create']);
Route::put('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::patch('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.update', 'uses' => 'Inventory\transferController@update']);
Route::delete('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.destroy', 'uses' => 'Inventory\transferController@destroy']);
Route::get('inventory/transfers/{transfers}', ['as'=> 'inventory.transfers.show', 'uses' => 'Inventory\transferController@show']);
Route::get('inventory/transfers/{transfers}/edit', ['as'=> 'inventory.transfers.edit', 'uses' => 'Inventory\transferController@edit']);

// stock details
Route::post('inventory/stockDetails/dostockout', ['as'=> 'inventory.stock_details.stockout', 'uses' => 'Inventory\StockDetailsController@dostockout']);
Route::get('inventory/stockDetails/stockout', ['as'=> 'inventory.stock_details.stockout', 'uses' => 'Inventory\StockDetailsController@stockout']);
Route::post('/inventory/stockDetails/store', 'Inventory\StockDetailsController@store');
Route::get('inventory/stockDetails', ['as'=> 'inventory.stock_details.index', 'uses' => 'Inventory\StockDetailsController@index']);
Route::post('inventory/stockDetails', ['as'=> 'inventory.stock_details.store', 'uses' => 'Inventory\StockDetailsController@store']);
Route::get('inventory/stockDetails/create', ['as'=> 'inventory.stock_details.create', 'uses' => 'Inventory\StockDetailsController@create']);
Route::put('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.update', 'uses' => 'Inventory\StockDetailsController@update']);
Route::patch('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.update', 'uses' => 'Inventory\StockDetailsController@update']);
Route::delete('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.destroy', 'uses' => 'Inventory\StockDetailsController@destroy']);
Route::get('inventory/stockDetails/{stockDetails}', ['as'=> 'inventory.stock_details.show', 'uses' => 'Inventory\StockDetailsController@show']);
Route::get('inventory/stockDetails/{stockDetails}/edit', ['as'=> 'inventory.stock_details.edit', 'uses' => 'Inventory\StockDetailsController@edit']);
Route::get('/inventory/stockDetails/print/{id}/{title}', 'Inventory\StockDetailsController@print');
// get item qty from stock
Route::get('/inventory/transfers/getitem_qty/{item_id}/{from_warehouse_id}', 'Inventory\transferController@getitem_qty');
Route::get('/inventory/transfers/getqty/{item_id}', 'Inventory\transferController@getqty');
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
Route::get('inventory/movementDetails', ['as'=> 'inventory.movement_details.index', 'uses' => 'Inventory\movementDetailsController@index']);
Route::post('inventory/movementDetails', ['as'=> 'inventory.movement_details.store', 'uses' => 'Inventory\movementDetailsController@store']);
Route::get('inventory/movementDetails/create', ['as'=> 'inventory.movement_details.create', 'uses' => 'Inventory\movementDetailsController@create']);
Route::put('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movement_details.update', 'uses' => 'Inventory\movementDetailsController@update']);
Route::patch('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movement_details.update', 'uses' => 'Inventory\movementDetailsController@update']);
Route::delete('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movement_details.destroy', 'uses' => 'Inventory\movementDetailsController@destroy']);
Route::get('inventory/movementDetails/{movementDetails}', ['as'=> 'inventory.movement_details.show', 'uses' => 'Inventory\movementDetailsController@show']);
Route::get('inventory/movementDetails/{movementDetails}/edit', ['as'=> 'inventory.movement_details.edit', 'uses' => 'Inventory\movementDetailsController@edit']);


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

//sales
Route::get('/sales/quotations/getservices/', 'Sales\QuotationsController@getservices');
Route::get('/sales/quotations/getItems/', 'Sales\QuotationsController@getItems');
Route::get('/sales/quotations/getqty/{item_id}', 'Sales\QuotationsController@getqty');
Route::get('sales/quotations', ['as'=> 'sales.quotations.index', 'uses' => 'Sales\QuotationsController@index']);
Route::post('sales/quotations', ['as'=> 'sales.quotations.store', 'uses' => 'Sales\QuotationsController@store']);
Route::get('sales/quotations/create', ['as'=> 'sales.quotations.create', 'uses' => 'Sales\QuotationsController@create']);
Route::put('sales/quotations/{quotations}', ['as'=> 'sales.quotations.update', 'uses' => 'Sales\QuotationsController@update']);
Route::patch('sales/quotations/{quotations}', ['as'=> 'sales.quotations.update', 'uses' => 'Sales\QuotationsController@update']);
Route::delete('sales/quotations/{quotations}', ['as'=> 'sales.quotations.destroy', 'uses' => 'Sales\QuotationsController@destroy']);
Route::get('sales/quotations/{quotations}', ['as'=> 'sales.quotations.show', 'uses' => 'Sales\QuotationsController@show']);
Route::get('sales/quotations/{quotations}/edit', ['as'=> 'sales.quotations.edit', 'uses' => 'Sales\QuotationsController@edit']);
//customers
Route::get('sales/customers', ['as'=> 'sales.customers.index', 'uses' => 'Sales\CustomersController@index']);
Route::post('sales/customers', ['as'=> 'sales.customers.store', 'uses' => 'Sales\CustomersController@store']);
Route::get('sales/customers/create', ['as'=> 'sales.customers.create', 'uses' => 'Sales\CustomersController@create']);
Route::put('sales/customers/{customers}', ['as'=> 'sales.customers.update', 'uses' => 'Sales\CustomersController@update']);
Route::patch('sales/customers/{customers}', ['as'=> 'sales.customers.update', 'uses' => 'Sales\CustomersController@update']);
Route::delete('sales/customers/{customers}', ['as'=> 'sales.customers.destroy', 'uses' => 'Sales\CustomersController@destroy']);
Route::get('sales/customers/{customers}', ['as'=> 'sales.customers.show', 'uses' => 'Sales\CustomersController@show']);
Route::get('sales/customers/{customers}/edit', ['as'=> 'sales.customers.edit', 'uses' => 'Sales\CustomersController@edit']);
});
