<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //triggers lazy loading exception when it detects lazy loading in the routes
        Model::preventLazyLoading();

        //paginator styling library select, defaults to tailwind.
        //Paginator::useBootstrap();

    }
}
