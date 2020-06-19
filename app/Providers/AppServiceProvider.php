<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }

        Paginator::defaultView('vendor.pagination.pagination');
        Paginator::defaultSimpleView('vendor.pagination.pagination');
    }
}
