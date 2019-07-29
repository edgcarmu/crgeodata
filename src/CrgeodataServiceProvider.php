<?php

namespace Edgcarmu\Crgeodata;

use Illuminate\Support\ServiceProvider;
use Edgcarmu\Crgeodata\app\Console\Commands\Seed;
use Edgcarmu\Crgeodata\app\Console\Commands\InstallCRGeoData;

class CrgeodataServiceProvider extends ServiceProvider
{
    protected $commands = [
        InstallCRGeoData::class,
        Seed::class,
    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'edgcarmu');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // register the artisan commands
        $this->commands($this->commands);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton('crgeodata', function ($app) {
            return new crgeodata;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['crgeodata'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // publish the migrations and seeds
        $this->publishes([__DIR__.'/database/migrations/' => database_path('migrations')], 'migrations');
        $this->publishes([__DIR__.'/database/seeds/' => database_path('seeds')], 'seeds');

        // publish translation files
        $this->publishes([__DIR__.'/resources/lang' => resource_path('lang/vendor/edgcarmu')], 'lang');
    }
}
