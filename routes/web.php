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

Route::group(['prefix' => 'forum'], function () {
    Route::get('/', 'ThreadsController@index')->name('forum');
    Route::get('/{channel}', 'ThreadsController@channel')->name('channel');
});
/*
Route::get('threads/create', 'ThreadsController@create');
Route::get('threads/{channel}/{thread}', 'ThreadsController@show');
Route::delete('threads/{channel}/{thread}', 'ThreadsController@destroy');
Route::post('threads', 'ThreadsController@store');
Route::get('threads/{channel}', 'ThreadsController@index');
Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');
Route::delete('/replies/{reply}', 'RepliesController@destroy');
Route::get('channels/create', 'ChannelsController@create');
Route::post('channels', 'ChannelsController@store');
Route::post('/replies/{reply}/favorites', 'FavoritesController@store');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
*/