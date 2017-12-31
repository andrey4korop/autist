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

//Страници
Route::get('/', 'PageController@index');
Route::get('page/{url?}', 'PageController@page')->name('page');
Route::get('register_please/', 'PageController@register_please')->name('register_please');
Route::get('document/', 'PageController@document')->name('document');
Route::get('document/{Category}/{subCategory?}', 'PageController@documenttt')->name('documenttt');
//Блог
Route::get('blog/', 'BlogController@index')->name('blogAll');
Route::get('blog/{url}', 'BlogController@blog')->name('blog');
//Новости
Route::get('news/', 'NewsController@index')->name('newAll');
Route::get('new/{url}', 'NewsController@new')->name('new');
//Це важливо
Route::get('vazlivo/', 'ThisIntController@index')->name('vazlivoAll');
Route::get('vazlivo/{url}', 'ThisIntController@vazlivo')->name('vazlivo');
//Видео
Route::get('media/', 'MediaController@index')->name('mediaAll');
Route::get('media/{url}', 'MediaController@media')->name('media');
//Книги
Route::get('books/', 'BooksController@index')->name('booksAll');
Route::get('books/{url}', 'BooksController@books')->name('books');
//Подписка
Route::post('subscribe', ['uses' => 'SubscribeController@create', 'as' => 'subscribe']);
//Коментарии
Route::post('comment', ['uses' => 'CommentController@store', 'as' => 'comment']);
//Авторизация
Auth::routes();
Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
})->name('logout');
//Форум
Route::group(['prefix' => 'forum'], function () {
    Route::get('/', 'ThreadsController@index')->name('forum');
    Route::get('/{channel}', 'ThreadsController@channel')->name('channel');
    Route::get('/{channel}/create', 'ThreadsController@threadscreate')->name('threads');
    Route::post('/{channel}/create', 'ThreadsController@threadssave');
    Route::get('/{channel}/{thread}', 'ThreadsController@replies')->name('replies');
    Route::post('/{channel}/{thread}', 'ThreadsController@repliesCreate')->name('repliesCreate');
});
