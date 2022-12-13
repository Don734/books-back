<?php

namespace App\Payment\Apelsin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ApelsinServiceProvider extends ServiceProvider 
{
    public $namespace = "App\Payment\Apelsin\Http";

    public function register()
    {
        $this->app->singleton("Apelsin", function ($app) {
            return new Apelsin;
        });
    }

    public function boot()
    {
        $this->registerEndpoint(config("app.asset_url"));
        $this->publishes([
            __DIR__ . '/config/apelsin.php' => config_path('apelsin.php')
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/config/apelsin.php',
            'apelsin'
        );
    }

    public function registerEndpoint($domain)
    {
        Route::domain($domain)->prefix("apelsin")
            ->middleware([
                'api'
            ])
            ->namespace($this->namespace)
            ->group(function () {
                Route::post("success", ['uses' => "ApelsinController@transactionStatus"]);
            });
    }
}