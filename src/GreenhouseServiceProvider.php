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
            __DIR__.'/config/app.php' => config_path('app.php'),
            __DIR__.'/config/fortify.php' => config_path('fortify.php'),
            __DIR__.'/config/green.php' => config_path('green.php'),
            __DIR__.'/config/sanctum.php' => config_path('sanctum.php'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/views' => resource_path('views/vendor/green'),
            __DIR__.'/public' => public_path('/'),
        ], 'terawatt-greenhouse');
    }
}
