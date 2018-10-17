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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');


Route::resource('categories', 'categoryController');

Route::resource('categories', 'categoryController');

Route::resource('units', 'unitsController');

Route::resource('units', 'unitsController');

Route::resource('hrDepartments', 'hr_departmentController');

Route::resource('hrDepartments', 'hr_departmentController');

Route::resource('units', 'unitsController');