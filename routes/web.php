<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\StoreController;
use \App\Http\Controllers\AboutController;
use \App\Http\Controllers\HelpController;
use \App\Http\Controllers\BlogController;
use \App\Http\Controllers\CartController;
use \App\Http\Controllers\PlanController;
use \App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth
Auth::routes(['register' => false]);
Route::get('/register/{plan_slug}m{plan_months}', [RegisterController::class, 'index'])->name('register');


// Site
Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/plans', [PlanController::class, 'all'])
    ->name('plans');

Route::get('/cart', [CartController::class, 'index'])
    ->name('cart');
Route::post('/cart-add/{product_id}', [CartController::class, 'add'])
    ->name('cart.save');
Route::get('/checkout', [CartController::class, 'checkout'])
    ->name('checkout');

Route::get('/store', [StoreController::class, 'index'])
    ->name('store');
Route::get('/store/{store_slug}', [StoreController::class, 'detail'])
    ->name('store.detail');

Route::get('/about', [AboutController::class, 'index'])
    ->name('about');

Route::get('/help', [HelpController::class, 'index'])
    ->name('help');

Route::get('/blogs', [BlogController::class, 'index'])
    ->name('blogs');
Route::get('/blog/{blog_slug}', [BlogController::class, 'detail'])
    ->name('blog.detail');

Route::get('/service/{service_slug}', [ServiceController::class, 'detail'])
    ->name('service.detail');

