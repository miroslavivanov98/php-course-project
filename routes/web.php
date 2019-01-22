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

Route::get('/admin', 'Admin\IndexController@index');
Route::resource('/admin/ads', 'Admin\AdController');
Route::get('/admin/ads/{id}/approve', 'Admin\AdController@approve');
Route::get('/admin/ads/{id}/delete', 'Admin\AdController@delete');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/users', 'Admin\AdminController@index');
Route::get('/admin/users/{id}/admin/{admin}', 'Admin\AdminController@makeadmin');
Route::resource('/ads', 'AdControler');

