<?php

namespace App\Payment\Paycom;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PaycomServiceProvider extends ServiceProvider
{
    protected $namespace = "App\Payment\Paycom\Http";

    public function register()
    {
        $this->app->singleton("Paycom", function ($app) {
            return new Paycom();
        });
    }

    public function boot()
    {
        $this->registerEndpoint(config("app.asset_url"));
        $this->publishes([
            __DIR__ . '/config/paycom.php' => config_path('paycom.php')
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/config/paycom.php',
            'paycom'
        );
    }

    public function registerEndpoint($domain)
    {
        Route::domain($domain)->prefix("paycom")
            ->middleware([
                'api',
                \App\Payment\Paycom\Http\Middleware\Authenticate::class,
                \App\Payment\Paycom\Http\Middleware\ValidJson::class
            ])
            ->namespace($this->namespace)
            ->group(function () {
                Route::post("endpoint/success", ['uses' => "PaycomController@dispatcher"]);
            });
    }
}
