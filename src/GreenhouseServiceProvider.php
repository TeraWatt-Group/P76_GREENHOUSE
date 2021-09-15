<?php

namespace Terawatt\Greenhouse;

use Illuminate\Support\ServiceProvider;

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
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadViewsFrom(__DIR__.'/views', 'green');

        $this->publishes([
            __DIR__.'/../stubs/FortifyServiceProvider.php' => app_path('Providers/FortifyServiceProvider.php'),
            __DIR__.'/config/green.php' => config_path('green.php'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/public' => public_path('/'),
        ], 'terawatt-greenhouse');
    }
}
