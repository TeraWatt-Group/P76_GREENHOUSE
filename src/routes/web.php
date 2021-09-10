<?php

Route::get('/', function(){
	return view('vendor.green.welcome');
})->name('welcome');

Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

});