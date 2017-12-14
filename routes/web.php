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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PageController@index');
Route::get('page/{url?}', 'PageController@page');
Route::get('blog/', 'BlogController@index');
Route::get('blog/{url}', 'BlogController@blog');
Route::get('news/', 'NewsController@index');
Route::get('new/{url}', 'NewsController@blog');
Auth::routes();