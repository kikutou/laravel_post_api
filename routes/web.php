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

Route::get('site/add','SiteController@add')->name('get_site_add');
Route::post('site/add','SiteController@add')->name('post_site_add');

Route::get('site/{code}/edit', 'SiteController@edit')->name('get_site_edit');


