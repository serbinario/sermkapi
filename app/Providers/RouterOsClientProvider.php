<?php

namespace SerMkApi\Providers;

use Illuminate\Support\ServiceProvider;
use SerMkApi\Services\RouterOS\RouterOsClientService;

class RouterOsClientProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RouterOsClientService::class, function ($app) {
            return new RouterOsClientService( );
        });
    }
}
