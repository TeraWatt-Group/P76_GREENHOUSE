<?php

Route::get('/', function(){
	return view('home');
})->name('home');

Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

});