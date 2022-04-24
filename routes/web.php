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


Route::group(['middleware' => 'auth'], function () {
    Route::get('/campgrounds', 'CampgroundsController@index');
    Route::get('/campgrounds/create', 'CampgroundsController@create');
    Route::get('/campgrounds/{campground}', 'CampgroundsController@show');
    Route::get('/campgrounds/{campground}/edit', 'CampgroundsController@edit');
    Route::patch('/campgrounds/{campground}', 'CampgroundsController@update');
    Route::post('/campgrounds', 'CampgroundsController@store');
    Route::delete('/campgrounds/{campground}', 'CampgroundsController@destroy');

    Route::post('/campgrounds/{campground}/comments/edit', 'CampgroundCommentsController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});


Auth::routes();
