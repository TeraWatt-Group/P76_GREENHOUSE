<?php

Route::get('/', function(){
	return view('welcome');
})->name('welcome');

Route::get('/home', function(){
	return view('home');
})->name('home');

Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

});