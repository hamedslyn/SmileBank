<?php

namespace Smile\Bank;

use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bank.php', 'bank');

        $this->app->singleton('bank', function ($app) {
            return new Bank;
        });
    }


    public function provides()
    {
        return ['bank'];
    }


    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/bank.php' => config_path('bank.php'),
        ], 'bank.config');


        // $this->commands([]);
    }
}
