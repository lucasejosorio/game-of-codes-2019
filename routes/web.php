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
    Route::get('/{ride_id}', 'RidesController@show')->name('ride.show');
    Route::post('/{ride_id}/comment', 'CommentController@store')->name('comment.store');
});

