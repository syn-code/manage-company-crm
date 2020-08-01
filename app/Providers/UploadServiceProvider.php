<?php

namespace App\Providers;

use App\FileHandling\StoreUpload;
use App\Interfaces\UploadInterface;
use Illuminate\Support\ServiceProvider;

class UploadServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        if (request()->getRequestUri() == '/company') {
            $this->app->singleton(UploadInterface::class, function ($app) {
                return new StoreUpload();
            });
        }
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
