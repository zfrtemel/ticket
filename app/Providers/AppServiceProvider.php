<?php

namespace App\Providers;

use App\Http\Classes\RequestAPI;
use App\Services\Riak\Connection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RequestAPI::class, function ($app) {
            return new RequestAPI();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
