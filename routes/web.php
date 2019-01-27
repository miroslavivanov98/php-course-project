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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// localhost:8000/admin
Route::get('/admin', 'Admin\IndexController@index');

// localhost:8000/admin/ads
Route::resource('/admin/ads', 'Admin\AdController');
Route::get('/admin/ads/{id}/approve', 'Admin\AdController@approve');
Route::get('/admin/ads/{id}/delete', 'Admin\AdController@delete');
Route::get('/home', 'HomeController@index')->name('home');

// localhost:8000/admin/users
Route::get('/admin/users', 'Admin\AdminController@index');
// localhost:8000/admin/{id}/admin/{admin}
Route::get('/admin/users/{id}/admin/{admin}', 'Admin\AdminController@makeadmin');

// localhost:8000/ads
Route::resource('/ads', 'AdControler');

// localhost:8000/search 
Route::get('/search','Admin\AdController@search');
Route::get('/search','AdControler@search');
