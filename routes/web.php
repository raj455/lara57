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

Route::as('admin.')->prefix('admin')->middleware(['auth', 'admin'])->namespace('Admin')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::as('author.')->prefix('author')->middleware(['auth', 'author'])->namespace('Author')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});