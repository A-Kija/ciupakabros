<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CatsService;
use Illuminate\Contracts\Foundation\Application;

class CatsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CatsService::class, function (Application $app) {
            return new CatsService();
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
