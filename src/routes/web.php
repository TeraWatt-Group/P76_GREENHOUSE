<?php

Route::middleware(['web'])->group(function () {
    Route::get('/', function(){ return view('welcome'); })->name('welcome');
});

Route::middleware(['web', 'auth'])->group(function () {
	Route::get('/home', function(){ return view('home'); })->name('home');

	Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

	});
});