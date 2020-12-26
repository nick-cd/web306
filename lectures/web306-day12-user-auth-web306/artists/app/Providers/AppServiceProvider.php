<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// This is not provided by default and should be added to avoid migration errors.
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // This is not provided by default and should be added to avoid migration errors.
        Schema::defaultStringLength(191);
    }
}
