<?php

// Route::middleware(['web'])->group(function () {
Route::group(['namespace' => '\\Terawatt\\Greenhouse\\Http\\Controllers', 'middleware' => ['web']], function () {
    Route::get('/', ['uses' => 'WelcomeController@index', 'as' => 'welcome']);

    Route::group(['prefix' => 'green', 'as' => 'green.'], function () {
    	Route::get('about', ['uses' => 'AboutController@index', 'as' => 'about']);
    	Route::get('technologies', ['uses' => 'TechnologiesController@index', 'as' => 'technologies']);
    	Route::resource('equipment', EquipmentController::class)->only(['index', 'show']);
    	Route::resource('product', ProductController::class)->only(['index', 'show']);
    	Route::resource('blog', BlogController::class)->only(['index', 'show']);
    	Route::get('contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);
    	Route::get('create', ['uses' => 'ProfileController@create', 'as' => 'create']);
    });

	Route::middleware(['auth'])->group(function () {
		Route::get('/home', function(){ return view('home'); })->name('home');

		Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
			Route::group(['prefix' => 'greenhouse', 'as' => 'greenhouse.'], function () {
				Route::get('/', ['uses' => 'ProfileController@greenhouse', 'as' => 'index']);
				Route::resource('orders', ProfileController::class)->only(['index', 'create', 'store', 'destroy']);
				Route::get('{equipmentid}', ['uses' => 'ProfileController@show', 'as' => 'show']);
		    });

		    // Route::get('api-tokens', [App\Http\Controllers\ProfileController::class, 'api_tokens'])->name('api_tokens');
		    // Route::get('profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
		    // Route::get('admin', [App\Http\Controllers\ProfileController::class, 'admin'])->name('admin');
		    // Route::get('security', [App\Http\Controllers\ProfileController::class, 'security'])->name('security');
		    // Route::get('emails', [App\Http\Controllers\ProfileController::class, 'emails'])->name('emails');

		    // Route::post('migration', [App\Http\Controllers\ProfileController::class, 'migration'])->name('migration');
		    // Route::post('change_password', [App\Http\Controllers\ProfileController::class, 'change_password'])->name('change_password');
		    // Route::delete('delete_account', [App\Http\Controllers\ProfileController::class, 'delete_account'])->name('delete_account');
		});
	});
});