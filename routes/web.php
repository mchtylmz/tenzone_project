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

use \App\Http\Controllers\Teacher\HomeController as PanelTeacherController;

use \App\Http\Controllers\Therapy\HomeController as PanelTherapyController;

use \App\Http\Controllers\Admin\HomeController as PanelAdminController;
use \App\Http\Controllers\Admin\UserController as PanelAdminUserController;
use \App\Http\Controllers\Admin\OrderController as PanelAdminOrderController;

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

Route::get('/terms', [HomeController::class, 'terms'])->name('terms');

Route::get('/policy', [HomeController::class, 'policy'])->name('policy');

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
    Route::post('/profile/{username}', [HomeController::class, 'profile_save'])->name('user.profile');

    Route::get('/logout', [HomeController::class, 'logout'])->name('my.logout');
    Route::get('/plan/subscribe', [PlanController::class, 'subscribe'])->name('plan.subscribe');
    Route::get('/plan/update/{plan_slug}', [PlanController::class, 'update'])->name('update.plan');
    Route::post('/plan/checkout/{plan_slug}', [PlanController::class, 'checkout'])->name('plan.checkout');

    Route::post('/send-submission/{activite_id}', [PanelUserController::class, 'storeSubmission'])->name('send.submission');
    Route::post('/meet-cancel/{meet_id}', [HomeController::class, 'meet_cancel'])->name('meet.cancel');
    Route::post('/meet-book/{meet_id}', [HomeController::class, 'meet_book'])->name('meet.book');

    Route::get('/buy-credit', [HomeController::class, 'buy_credit'])->name('buy.credit');
    Route::post('/update-credit/{plan_id}', [HomeController::class, 'update_credit'])->name('update.credit');

    Route::post('/payment/therapy/{meet_id}/{therapist_service_id}/{user_id}', [
        HomeController::class, 'payment_therapy'
    ])->name('payment.therapy');
});


// user
Route::middleware(['auth', 'plan', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        Route::get('/', [PanelUserController::class, 'index'])->name('index');
        Route::get('/reports', [PanelUserController::class, 'reports'])->name('reports');
        Route::get('/connect', [PanelUserController::class, 'connect'])->name('connect');

        Route::get('/book/teachers', [PanelUserController::class, 'book_teachers'])->name('book.teachers');
        Route::get('/book/teacher/{user_id}', [PanelUserController::class, 'book_teacher'])->name('book.teacher');

        Route::get('/book/therapy/services', [PanelUserController::class, 'book_therapy_services'])->name('book.therapy_services');
        Route::get('/book/therapist/{therapy_service_id}', [PanelUserController::class, 'book_therapist'])->name('book.therapist');
        Route::get('/book/therapy/{therapy_service_id}/{user_id}', [PanelUserController::class, 'book_teacher'])->name('book.therapy');
    });



// parent
Route::middleware(['auth', 'plan', 'role:parent'])
    ->prefix('parent')
    ->name('parent.')
    ->group(function () {

        Route::get('/', [PanelParentController::class, 'index'])->name('index');
        Route::get('/programme/{child_id}', [PanelParentController::class, 'child_programme'])
            ->name('child_programme');

        Route::get('/reports', [PanelParentController::class, 'reports'])->name('reports');
        Route::get('/report/{child_id}', [PanelParentController::class, 'child_report'])
            ->name('child_report');

        Route::get('/connect', [PanelParentController::class, 'connect'])->name('connect');
        Route::get('/book/teachers', [PanelParentController::class, 'book_teachers'])->name('book.teachers');
        Route::get('/book/teacher/{user_id}', [PanelParentController::class, 'book_teacher'])->name('book.teacher');

        Route::get('/child-add', [PanelParentController::class, 'child_add'])->name('child.add');
        Route::post('/child-add', [PanelParentController::class, 'child_store'])->name('child.store');

        Route::get('/my-subscription', [PanelParentController::class, 'mysubscription'])->name('subscription');
        Route::post('/subscription-cancel/{plan_id}', [PanelParentController::class, 'mysubscription_save'])->name('subscription_cancel');

        Route::get('/book/therapy/services', [PanelParentController::class, 'book_therapy_services'])->name('book.therapy_services');
        Route::get('/book/therapist/{therapy_service_id}', [PanelParentController::class, 'book_therapist'])->name('book.therapist');
        Route::get('/book/therapy/{therapist_service_id}/{user_id}', [PanelParentController::class, 'book_therapy'])->name('book.therapy');
    });


// teacher
Route::middleware(['auth', 'role:teacher'])
    ->prefix('teacher')
    ->name('teacher.')
    ->group(function () {

        Route::get('/', [PanelTeacherController::class, 'index'])->name('index');
        Route::get('/programme/{child_id}', [PanelTeacherController::class, 'child_programme'])
            ->name('child_programme');

        Route::post('/add-week', [PanelTeacherController::class, 'store_week'])->name('add.week');
        Route::post('/add-activity/{week_id}', [PanelTeacherController::class, 'store_activity'])->name('add.activity');
        Route::delete('/delete-activite/{activite_id}', [PanelTeacherController::class, 'delete_activite'])
            ->name('delete.activite');

        Route::get('/reports', [PanelTeacherController::class, 'reports'])->name('reports');
        Route::get('/report/{child_id}', [PanelTeacherController::class, 'child_report'])
            ->name('child_report');
        Route::post('/add-report/{child_id}', [PanelTeacherController::class, 'store_report'])->name('add.report');

        Route::get('/connect', [PanelTeacherController::class, 'connect'])->name('connect');
        Route::post('/connect-availability', [PanelTeacherController::class, 'connect_availability'])
            ->name('meet.availability');
        Route::post('/connect-update/{meet_id}', [PanelTeacherController::class, 'update_conect'])
            ->name('meet.update');

    });



// therapy
Route::middleware(['auth', 'role:therapy'])
    ->prefix('therapy')
    ->name('therapy.')
    ->group(function () {

        Route::get('/', [PanelTherapyController::class, 'index'])->name('index');
        Route::get('/programme/{child_id}', [PanelTherapyController::class, 'child_programme'])
            ->name('child_programme');

        Route::post('/add-week', [PanelTherapyController::class, 'store_week'])->name('add.week');
        Route::post('/add-activity/{week_id}', [PanelTherapyController::class, 'store_activity'])->name('add.activity');
        Route::delete('/delete-activite/{activite_id}', [PanelTherapyController::class, 'delete_activite'])
            ->name('delete.activite');

        Route::get('/reports', [PanelTherapyController::class, 'reports'])->name('reports');
        Route::get('/report/{child_id}', [PanelTherapyController::class, 'child_report'])
            ->name('child_report');
        Route::post('/add-report/{child_id}', [PanelTherapyController::class, 'store_report'])->name('add.report');

        Route::get('/connect', [PanelTherapyController::class, 'connect'])->name('connect');
        Route::post('/connect-availability', [PanelTherapyController::class, 'connect_availability'])
            ->name('meet.availability');
        Route::post('/connect-update/{meet_id}', [PanelTherapyController::class, 'update_conect'])
            ->name('meet.update');

        Route::get('/services', [PanelTherapyController::class, 'services'])->name('services');
        Route::post('/service/add', [PanelTherapyController::class, 'store_service'])
            ->name('service.add');
        Route::post('/service/edit/{therapist_service_id}', [PanelTherapyController::class, 'update_service'])
            ->name('service.update');
        Route::post('/service/delete/{therapist_service_id}', [PanelTherapyController::class, 'delete_service'])
            ->name('service.delete');
    });

// admin
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [PanelAdminController::class, 'index'])->name('index');
        Route::get('/orders', [PanelAdminOrderController::class, 'index'])->name('orders');
        Route::get('/connects', [PanelAdminController::class, 'connects'])->name('connects');

        Route::get('/helps', [PanelAdminController::class, 'helps'])->name('helps');
        Route::post('/help/add', [PanelAdminController::class, 'help_add'])->name('help.add');
        Route::post('/help/save/{help_id}', [PanelAdminController::class, 'help_save'])->name('help.save');
        Route::post('/help/delete/{help_id}', [PanelAdminController::class, 'help_delete'])->name('help.delete');

        Route::get('/therapy-services', [PanelAdminController::class, 'therapy_services'])->name('therapy');
        Route::post('/therapy-service/add', [PanelAdminController::class, 'therapy_add'])->name('therapy.add');
        Route::post('/therapy-service/save', [PanelAdminController::class, 'therapy_save'])->name('therapy.save');
        Route::post('/therapy-service/delete', [PanelAdminController::class, 'therapy_delete'])->name('therapy.delete');

        Route::prefix('user')
            ->name('user.')
            ->group(function () {

                Route::get('/add', [PanelAdminUserController::class, 'index'])->name('add');
                Route::get('/edit/{user_id}', [PanelAdminUserController::class, 'edit'])->name('edit');
                Route::post('/edit/{user_id}', [PanelAdminUserController::class, 'update'])->name('edit');
                Route::post('/store', [PanelAdminUserController::class, 'store'])->name('store');
                Route::post('/delete/{user_id}', [PanelAdminUserController::class, 'delete'])->name('delete');
            });

    });

