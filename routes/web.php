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

// Auth
Auth::routes();

// Dashboard routes
Route::prefix('dashboard')->name('dashboard.')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::resource('articles', 'ArticleController');
});

// Front routes
Route::prefix('')->name('front.')->namespace('Front')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');
});
