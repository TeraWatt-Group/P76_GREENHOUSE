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

        $this->loadViewsFrom(__DIR__.'/views', 'green');

        $this->publishes([
            __DIR__.'/config/green.php' => config_path('green.php')
        ], 'green-config');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations')
        ], 'green-migrations');
    }
}
