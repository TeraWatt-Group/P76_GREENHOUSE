<?php

namespace Terawatt\Greenhouse;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Terawatt\Greenhouse\Http\Middleware\AdminAccessCheck;
use Terawatt\Greenhouse\Facades\Greenhouse as GreenhouseFacade;

class GreenhouseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Greenhouse', GreenhouseFacade::class);

        $this->app->singleton('greenhouse', function () {
            return new Greenhouse();
        });

        // $this->app->singleton('GreenhouseGuard', function () {
        //     return config('auth.defaults.guard', 'web');
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        //
        $this->registerRoutes();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'green');

        $this->publishes([
            __DIR__.'/../stubs/FortifyServiceProvider.php' => app_path('Providers/FortifyServiceProvider.php'),
            __DIR__.'/config/green.php' => config_path('green.php'),
            __DIR__.'/resources/lang' => resource_path('lang'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/database/seeders' => database_path('seeders'),
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/public' => public_path('/'),
        ], 'terawatt-greenhouse');

        // $kernel = $this->app->make(Kernel::class);
        // $kernel->pushMiddleware(AdminAccessCheck::class);

        // Livewire::component('green::product', SomeComponent::class);
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
            // 'middleware' => ['admin'],
            'middleware' => ['web'],
        ];
    }
}
