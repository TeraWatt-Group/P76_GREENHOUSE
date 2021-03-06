<?php

namespace Terawatt\Greenhouse;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Terawatt\Greenhouse\Http\Middleware\AdminAccessCheck;
use Terawatt\Greenhouse\Facades\Greenhouse as GreenhouseFacade;
use Illuminate\Database\Query\Builder;

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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Builder::macro('search', function($field, $string) {
            return $string ? $this->where($field, 'like', '%' . $string . '%') : $this;
        });

        $router->pushMiddlewareToGroup('admin', AdminAccessCheck::class);

        //
        $this->registerRoutes();
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'green');

        $this->publishes([
            __DIR__.'/Http/Livewire' => app_path('Http/Livewire'),
            __DIR__.'/Models' => app_path('Models'),
            __DIR__.'/../stubs/FortifyServiceProvider.php' => app_path('Providers/FortifyServiceProvider.php'),
            __DIR__.'/config/green.php' => config_path('green.php'),
            __DIR__.'/../resources/lang' => resource_path('lang'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/database/seeders' => database_path('seeders'),
            __DIR__.'/database/factories' => database_path('factories'),
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/../public' => public_path('/'),
        ], 'terawatt-greenhouse');

        $this->loadHelpers();
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
            'middleware' => ['web'],
        ];
    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }
}
