<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Store;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
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
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        // Plan
        Route::bind('plan_slug', function ($slug) {
            return Plan::whereSlug($slug)->firstOrFail();
        });
        // Store
        Route::bind('store_slug', function ($slug) {
            return Store::whereSlug($slug)->firstOrFail();
        });
        // Blog
        Route::bind('blog_slug', function ($slug) {
            return Blog::whereSlug($slug)->firstOrFail();
        });
        // Service
        Route::bind('service_slug', function ($slug) {
            return Service::whereSlug($slug)->firstOrFail();
        });
    }
}
