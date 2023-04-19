<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ColorNamingService;
use Illuminate\Contracts\Foundation\Application;

class ColorNamingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ColorNamingService::class, function (Application $app) {
            return new ColorNamingService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
