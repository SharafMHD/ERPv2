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
Auth::routes();
Route::group(array('prefix' => LaravelLocalization::getCurrentLocale()), function () {
    Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('categories', 'categoryController');

Route::resource('categories', 'categoryController');

Route::resource('units', 'unitsController');

Route::resource('units', 'unitsController');

Route::resource('hrDepartments', 'hr_departmentController');

Route::resource('hrDepartments', 'hr_departmentController');

Route::resource('units', 'unitsController');
        // language
        Route::get('language/set-locale/{language}', array('as' => 'admin.language.set',
                                                           'uses' => 'LanguageController@setLocale', ));
});