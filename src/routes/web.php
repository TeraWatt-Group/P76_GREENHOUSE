<?php

// Route::middleware(['web'])->group(function () {
Route::group(['namespace' => '\\Terawatt\\Greenhouse\\Http\\Controllers', 'middleware' => ['web']], function () {
    Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'welcome']);

	Route::middleware(['auth'])->group(function () {
		Route::get('/home', function(){ return view('home'); })->name('home');

		Route::group(['prefix' => 'green', 'as' => 'green.'], function () {
			Route::resource('product', ProductController::class)->only(['index', 'show']);
		});
	});
});