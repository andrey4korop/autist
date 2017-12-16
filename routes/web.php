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
Route::get('page/{url?}', 'PageController@page')->name('page');
Route::get('blog/', 'BlogController@index')->name('blogAll');
Route::get('blog/{url}', 'BlogController@blog')->name('blog');
Route::get('news/', 'NewsController@index')->name('newAll');
Route::get('new/{url}', 'NewsController@new')->name('new');
Route::get('vazlivo/', 'ThisIntController@index')->name('vazlivoAll');
Route::get('vazlivo/{url}', 'ThisIntController@vazlivo')->name('vazlivo');

Route::post('comment', ['uses' => 'CommentController@store', 'as' => 'comment']);
Auth::routes();