<?php

namespace  App\Payment\Click;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ClickServiceProvider extends ServiceProvider
{
    protected $namespace = "App\Payment\Click";
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton("Click", function ($app) {
            return new Click();
        });
    }

    public function boot()
    {
        $this->registerEndpoint(config("app.asset_url"));
        $this->publishes([
            __DIR__ . '/config/click.php' => config_path('click.php')
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__ . '/config/click.php',
            'click'
        );
    }


    public function registerEndpoint($domain)
    {
        Route::domain($domain)->prefix("click")
            ->middleware(['api'])
            ->namespace($this->namespace)
            ->group(function () {
                Route::post("endpoint/prepare", ['uses' => "ClickController@actionPrepare"]);
                Route::post("endpoint/confirm", ['uses' => "ClickController@actionConfirm"]);
            });
    }
}
