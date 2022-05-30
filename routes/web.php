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
use \App\Http\Controllers\BookController;

use \App\Http\Controllers\User\HomeController as PanelUserController;

use \App\Http\Controllers\Parent\HomeController as PanelParentController;

use \App\Http\Controllers\Admin\HomeController as PanelAdminController;

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
Route::get('/create-account/{plan_slug}', [RegisterController::class, 'index'])->name('register');
Route::post('/create-account/{plan_slug}', [RegisterController::class, 'create'])->name('register');

// Site
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/plans', [PlanController::class, 'all'])->name('plans');

Route::get('/book-free', [BookController::class, 'free']) ->name('book.free');
Route::post('/book-free', [BookController::class, 'freePost'])->name('book.free');
Route::get('/select-time', [BookController::class, 'time'])->name('select.time');
Route::get('/confirm-time/{time}', [BookController::class, 'confirmTime'])->name('confirm.time');
Route::post('/book-save', [BookController::class, 'timePost'])->name('book.save');
Route::get('/book-completed', [BookController::class, 'completed'])->name('book.completed');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart-add/{product_id}', [CartController::class, 'add'])->name('cart.save');
Route::post('/cart-delete/{product_id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart-checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/cart-response', [CartController::class, 'response'])->name('cart.response');

Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::get('/store/{store_slug}', [StoreController::class, 'detail'])->name('store.detail');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/help', [HelpController::class, 'index'])->name('help');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{blog_slug}', [BlogController::class, 'detail'])->name('blog.detail');

Route::get('/service/{service_slug}', [ServiceController::class, 'detail'])->name('service.detail');

// auth
Route::middleware(['auth'])->group(function () {
    Route::get('/my-account', [HomeController::class, 'myaccount'])->name('my.account');

    Route::get('/my-profile', [HomeController::class, 'myprofile'])->name('my.profile');
    Route::post('/my-profile', [HomeController::class, 'myprofile_save'])->name('my.profile');

    Route::get('/profile/{username}', [HomeController::class, 'profile'])->name('user.profile');
    Route::get('/logout', [HomeController::class, 'logout'])->name('my.logout');
    Route::get('/plan/subscribe', [PlanController::class, 'subscribe'])->name('plan.subscribe');
    Route::get('/plan/update/{plan_slug}', [PlanController::class, 'update'])->name('update.plan');
    Route::post('/plan/checkout/{plan_slug}', [PlanController::class, 'checkout'])->name('plan.checkout');
});


// user
Route::middleware(['auth', 'plan', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/', [PanelUserController::class, 'index'])->name('index');
    });



// parent
Route::middleware(['auth', 'plan', 'role:parent'])
    ->prefix('parent')
    ->name('parent.')
    ->group(function () {

        Route::get('/', [PanelParentController::class, 'index'])->name('index');
    });


// admin
Route::middleware(['auth', 'role:superamdin|admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [PanelAdminController::class, 'index'])->name('index');
    });
