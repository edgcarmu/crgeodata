<?php

namespace edgcarmu\crgeodata;

use Illuminate\Support\ServiceProvider;

class crgeodataServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'edgcarmu');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
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
        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/edgcarmu'),
        ], 'crgeodata.lang');

        // Registering package commands.
        // $this->commands([]);
    }
}
