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
//     return redirect('/en/home');
// });
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(array('prefix' => LaravelLocalization::getCurrentLocale(),'middleware'=>'CheckRole'), function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'categoryController');
    Route::resource('categories', 'categoryController');
    Route::resource('units', 'unitsController');
    Route::resource('hrDepartments', 'hr_departmentController');
    Route::resource('hrDepartments', 'hr_departmentController');
    Route::resource('units', 'unitsController');
    // language
        Route::get('language/set-locale/{language}', array('as' => 'admin.language.set','uses' => 'LanguageController@setLocale', ));
        Route::resource('departments', 'departmentController');
    // roles
        Route::get('/roles/{id}/assign', 'rolesController@assign')->name('roles.assign');
        Route::post('/roles/assignpost', 'rolesController@assignpost')->name('roles.assignpost');
        Route::resource('roles', 'rolesController');
    //users
        Route::resource('users', 'usersController');
        Route::resource('privileges', 'privilegesController');
        Route::get('/errors/403', 'rolesController@assign')->name('403');
        Route::resource('accounts', 'accountsController');

   });










