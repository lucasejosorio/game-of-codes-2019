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

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('ride')->group(function(){
    Route::get('/', 'RidesController@create')->name('ride.create');
    Route::post('/store', 'RidesController@store')->name('ride.store');
    Route::get('/{ride_id}', 'RidesController@show')->name('ride.show');
    Route::post('/{ride_id}/comment', 'CommentsController@store')->name('comment.store');

});

Route::prefix('user')->group(function(){
    Route::get('/{user}', 'UserController@show')->name('user.show');
    Route::get('/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::post('/{user}/edit', 'UserController@update')->name('user.update');
});
