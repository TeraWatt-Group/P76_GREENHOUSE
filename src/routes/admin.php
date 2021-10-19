<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace' => '\\Terawatt\\Greenhouse\\Http\\Controllers\\admin\\', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
	Route::get('/', ['uses' => 'DashboardController@index', 'as' => 'index']);

	Route::resource('users', UsersController::class);

	Route::resource('category', CategoryController::class);

	Route::resource('product', ProductController::class);

	Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
		Route::get('{product}/rcp/{rcp}/edit', ['uses' => 'RcpController@edit', 'as' => 'rcp.edit']);
	});

	Route::post('roles/restore/{id}', [\Terawatt\Greenhouse\Http\Controllers\admin\RolesController::class, 'restore'])->name('roles.restore');
	Route::delete('roles/forceDelete/{id}', [\Terawatt\Greenhouse\Http\Controllers\admin\RolesController::class, 'forceDelete'])->name('roles.forceDelete');
	Route::resource('roles', RolesController::class);

	Route::post('permissions/restore/{id}', [\Terawatt\Greenhouse\Http\Controllers\admin\PermissionsController::class, 'restore'])->name('permissions.restore');
	Route::delete('permissions/forceDelete/{id}', [\Terawatt\Greenhouse\Http\Controllers\admin\PermissionsController::class, 'forceDelete'])->name('permissions.forceDelete');
	Route::resource('permissions', PermissionsController::class);

	// Route::get('routes', [Terawatt\Greenhouse\Http\Controllers\admin\DashboardController::class, 'routes'])->name('routes');

	// Route::group(['middleware' => ['password.confirm'], 'prefix' => 'settings', 'as' => 'settings.'], function () {
	//     Route::get('/', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'index'])->name('index');
	//     Route::get('maintenance_mode', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'maintenance_mode'])->name('maintenance_mode');
	//     Route::post('maintenance_mode_chenge', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'maintenance_mode_chenge'])->name('maintenance_mode_chenge');

	//     Route::group(['prefix' => 'emails'], function () {
	//         Route::get('/', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'emails'])->name('emails');
	//         Route::post('change_emails', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'change_emails'])->name('change_emails');
	//         Route::get('check_emails', [Terawatt\Greenhouse\Http\Controllers\admin\SettingsController::class, 'check_emails'])->name('check_emails');
	//     });
	// });

    // Route::resource('languages', Terawatt\Greenhouse\Http\Controllers\admin\LanguageController::class);
    // Route::post('languages/sync', [Terawatt\Greenhouse\Http\Controllers\admin\LanguageController::class, 'sync'])->name('languages.sync');

	// Route::get('logs', [Terawatt\Greenhouse\Http\Controllers\admin\LogsController::class, 'index'])->name('logs');
});