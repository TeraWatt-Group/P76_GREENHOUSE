<?php

namespace Terawatt\Greenhouse;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Http\Kernel;
use Terawatt\Greenhouse\Http\Middleware\AdminAccessCheck;

class GreenhouseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/views', 'green');
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'green');

        $this->publishes([
            __DIR__.'/../stubs/FortifyServiceProvider.php' => app_path('Providers/FortifyServiceProvider.php'),
            __DIR__.'/config/green.php' => config_path('green.php'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/public' => public_path('/'),
        ], 'terawatt-greenhouse');

        // $kernel = $this->app->make(Kernel::class);
        // $kernel->pushMiddleware(AdminAccessCheck::class);
        // $router->aliasMiddleware('admin.user', VoyagerAdminMiddleware::class);
    }

    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');

        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/routes/admin.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('green.app_admin_prefix'),
            'middleware' => ['admin'],
            'as' => config('green.app_admin_prefix') . '.'
        ];
    }
}
