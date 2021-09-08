<?php

Route::get('/', function(){
	return view('green::home');
})->name('home');

Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

});