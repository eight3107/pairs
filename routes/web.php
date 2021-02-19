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

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {

    Route::get('edit/', 'UserController@edit')->name('users.edit');
    Route::post('update/', 'UserController@update')->name('users.update');
    Route::get('/index/', 'UserController@index')->name('users.index');
    Route::get('/receive', 'UserController@receive')->name('users.receive');
    Route::get('{user_id}/send', 'UserController@send')->name('users.send');
});

//コミュニティ
Route::get('/interests/', 'InterestsController@index')->name('interests');
Route::get('/interests/mypage', 'InterestsController@mypage')->name('interests.mypage');
Route::get('/interests/{id}', 'InterestsController@show')->name('interests.show');
Route::post('/interests/{id}/add', 'InterestsController@add')->name('interests.join');
Route::post('/interests/{id}/delete', 'InterestsController@destroy')->name('interests.delete');


Route::get('/goods/{receive_user_id}/create', 'GoodController@create')->name('goods.create');

Route::get('/goods/{user_id}/matching', 'GoodController@matching')->name('goods.matching');

Route::get('users/{receive_user_id}/hasgoods', 'GoodController@hasgood');

Route::get('/users/show/{id}', 'UserController@show')->name('users.show');

Route::get('/matching', 'MatchingController@index')->name('matching.index');

Route::post('/messages/show/', 'MessageController@show')->name('message.show');
Route::get('/messages/list/{matching_id}', 'MessageController@list')->name('message.list');
Route::post('/messages/store/{matching_id}', 'MessageController@store')->name('message.store');

Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
