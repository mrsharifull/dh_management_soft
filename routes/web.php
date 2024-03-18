<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\HostingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

    Route::get('/password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);
});

Auth::routes();

// Admin Dashboard Routes
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::group(['as' => 'am.', 'prefix' => 'admin-management'], function () {
        Route::controller(AdminController::class, 'admin')->prefix('admin')->name('admin.')->group(function () {
            Route::get('index', 'index')->name('admin_list');
            Route::get('details/{id}', 'details')->name('details.admin_list');
            // Route::get('profile/{id}', 'profile')->name('admin_profile');
            Route::get('create', 'create')->name('admin_create');
            Route::post('create', 'store')->name('admin_create');
            Route::get('edit/{id}', 'edit')->name('admin_edit');
            Route::put('edit/{id}', 'update')->name('admin_edit');
            Route::get('status/{id}', 'status')->name('status.admin_edit');
            Route::get('delete/{id}', 'delete')->name('admin_delete');
        });
    });

    // Company Routes 
    Route::controller(CompanyController::class, 'company')->prefix('company')->name('company.')->group(function () {
        Route::get('index', 'index')->name('company_list');
        Route::get('details/{id}', 'details')->name('details.company_list');
        Route::get('create', 'create')->name('company_create');
        Route::post('create', 'store')->name('company_create');
        Route::get('edit/{id}', 'edit')->name('company_edit');
        Route::put('edit/{id}', 'update')->name('company_edit');
        Route::get('status/{id}', 'status')->name('status.company_edit');
        Route::get('delete/{id}', 'delete')->name('company_delete');
    });
    // Hosting Routes 
    Route::controller(HostingController::class, 'hosting')->prefix('hosting')->name('hosting.')->group(function () {
        Route::get('index', 'index')->name('hosting_list');
        Route::get('details/{id}', 'details')->name('details.hosting_list');
        Route::get('create', 'create')->name('hosting_create');
        Route::post('create', 'store')->name('hosting_create');
        Route::get('edit/{id}', 'edit')->name('hosting_edit');
        Route::put('edit/{id}', 'update')->name('hosting_edit');
        Route::get('status/{id}', 'status')->name('status.hosting_edit');
        Route::get('delete/{id}', 'delete')->name('hosting_delete');
    });
    // Domain Routes 
    Route::controller(DomainController::class, 'domain')->prefix('domain')->name('domain.')->group(function () {
        Route::get('index', 'index')->name('domain_list');
        Route::get('details/{id}', 'details')->name('details.domain_list');
        Route::get('create', 'create')->name('domain_create');
        Route::post('create', 'store')->name('domain_create');
        Route::get('edit/{id}', 'edit')->name('domain_edit');
        Route::put('edit/{id}', 'update')->name('domain_edit');
        Route::get('status/{id}', 'status')->name('status.domain_edit');
        Route::get('developed/{id}', 'developed')->name('developed.domain_edit');
        Route::get('delete/{id}', 'delete')->name('domain_delete');
    });

    // Payment Routes 
    Route::controller(PaymentController::class, 'payment')->prefix('payment')->name('payment.')->group(function () {
        Route::get('index', 'index')->name('payment_list');
        Route::get('details/{id}', 'details')->name('details.payment_list');
        Route::get('create', 'create')->name('payment_create');
        Route::post('create', 'store')->name('payment_create');
        Route::get('edit/{id}', 'edit')->name('payment_edit');
        Route::put('edit/{id}', 'update')->name('payment_edit');
        Route::get('status/{id}', 'status')->name('status.payment_edit');
        Route::get('developed/{id}', 'developed')->name('developed.payment_edit');
        Route::get('delete/{id}', 'delete')->name('payment_delete');

        Route::get('get-hostings-or-domains/{payment_for}', 'get_hostings_or_domains')->name('get_hostings_or_domains.payment_list');
    });
});