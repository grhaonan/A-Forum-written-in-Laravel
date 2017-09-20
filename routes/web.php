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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/threads', 'ThreadController@index')->name('threads');

Route::get('/threads/create','ThreadController@create')->name('createThread');

Route::post('/threads', 'ThreadController@store')->name('storeThread');

Route::get('/threads/{channel}', 'ThreadController@index')->name('channelList');

Route::get('/threads/{channel}/{thread}', 'ThreadController@show')->name('showThread');

Route::delete('/threads/{channel}/{thread}', 'ThreadController@destroy')->name('deleteThread');

Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store')->name('replyThread');

Route::post('/threads/{channel}/{thread}/subscribe', 'ThreadSubscriptionController@store')->name('subscribeThread')->middleware('auth');

Route::delete('/threads/{channel}/{thread}/subscribe', 'ThreadSubscriptionController@destroy')->name('unsubscribeThread')->middleware('auth');

Route::get('/profiles/{user}', 'ProfilesController@show')->name('profiles');

Route::delete('/replies/{reply}', 'ReplyController@destroy')->name('deleteReply');
