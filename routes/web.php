<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::as('admin.')->prefix('admin')->middleware(['auth', 'admin'])->namespace('Admin')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::resource('tag', 'TagController');
	Route::resource('category', 'CategoryController');
	Route::resource('post', 'PostController');
});

Route::as('author.')->prefix('author')->middleware(['auth', 'author'])->namespace('Author')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});