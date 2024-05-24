<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// ==== Authnication
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\HomeController;

// === Middleware for PreventBackHistory of Browser data
use App\Http\Middleware\PreventBackHistoryMiddleware;

// === All Master
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PackageTypeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('auth.login');
})->name('/');

Route::group(['prefix' => 'xoom-digital'],function(){

    // ======================= Admin Login/Logout
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login/store', [LoginController::class, 'authenticate'])->name('login.store');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['prefix' => 'xoom-digital', 'middleware'=>['auth', PreventBackHistoryMiddleware::class]],function(){
    // =============== Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // ==== Update Password
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    // ==== Manage Employee
    Route::resource('employee', EmployeeController::class);

    // ==== Manage Package Type
    Route::resource('package-type', PackageTypeController::class);

    // ==== Manage Package
    Route::resource('package', PackageController::class);

    // ==== Manage Discount
    Route::resource('discount', DiscountController::class);

    // ==== Manage Task
    Route::resource('task', TaskController::class);
    Route::post('task/package/amount', [TaskController::class, 'fetchPackageAmount'])->name('task.package.amount');
});
