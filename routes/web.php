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
Auth::routes(['register' => false]);

// Dashboard routes
Route::prefix('dashboard')->name('dashboard.')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::resource('articles', 'ArticleController');
    Route::get('articles-requests', 'ArticleRequestController@index')->name('articles.requests');
});

// Front routes
Route::prefix('')->name('front.')->namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
    Route::post('/articles/{article}/request', 'ArticleController@storeRequest')->name('articles.store.request');

    Route::get('/about-us', 'HomeController@showAboutUs')->name('about-us');
    Route::get('/contact-us', 'HomeController@showContactUs')->name('contact-us');
});
