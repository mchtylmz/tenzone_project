<?php

namespace App\Providers;

use App\Models\Activities;
use App\Models\Blog;
use App\Models\Connects;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Store;
use App\Models\User;
use App\Models\Weeks;
use App\Models\Help;
use App\Models\TherapyService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

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
        Cashier::useCustomerModel(User::class);
        Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        // Plan
        Route::bind('plan_slug', function ($slug) {
            return Plan::whereSlug($slug)->firstOrFail();
        });
        // Plan id
        Route::bind('plan_id', function ($id) {
            return Plan::findOrFail($id);
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
        // username
        Route::bind('username', function ($email) {
            return User::whereEmail($email)->firstOrFail();
        });
        // child_id
        Route::bind('child_id', function ($id) {
            return User::findOrFail($id);
        });
        // user_id
        Route::bind('user_id', function ($id) {
            return User::findOrFail($id);
        });
        // activite_id
        Route::bind('activite_id', function ($id) {
            return Activities::findOrFail($id);
        });
        // week_id
        Route::bind('week_id', function ($id) {
            return Weeks::findOrFail($id);
        });
        // meet_id
        Route::bind('meet_id', function ($id) {
            return Connects::findOrFail($id);
        });
        // help_id
        Route::bind('help_id', function ($id) {
            return Help::findOrFail($id);
        });
        // therapy_service_id
        Route::bind('therapy_service_id', function ($id) {
            return TherapyService::findOrFail($id);
        });
    }
}
