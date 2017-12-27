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
Route::get('media/', 'MediaController@index')->name('mediaAll');
Route::get('media/{url}', 'MediaController@media')->name('media');
Route::get('books/', 'BooksController@index')->name('booksAll');
Route::get('books/{url}', 'BooksController@books')->name('books');
Route::post('subscribe', ['uses' => 'SubscribeController@create', 'as' => 'subscribe']);

Route::post('comment', ['uses' => 'CommentController@store', 'as' => 'comment']);
Auth::routes();

Route::group(['prefix' => 'forum'], function () {
    Route::get('/', 'ThreadsController@index')->name('forum');
    Route::get('/{channel}', 'ThreadsController@channel')->name('channel');
    Route::get('/{channel}/create', 'ThreadsController@threadscreate')->name('threads');
    Route::post('/{channel}/create', 'ThreadsController@threadssave');
    Route::get('/{channel}/{thread}', 'ThreadsController@replies')->name('replies');
    Route::post('/{channel}/{thread}', 'ThreadsController@repliesCreate')->name('repliesCreate');
});
