<?php

Route::get('/', function(){
	return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'green', 'as' => 'green.'], function () {

});