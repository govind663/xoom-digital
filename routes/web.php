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

// === Leads Controller
use App\Http\Controllers\LeadsController;
// === Customer Controller
use App\Http\Controllers\CustomerController;

// === Sales Report Controller
use App\Http\Controllers\SalesReportController;

// Assigned Lead Controller
use App\Http\Controllers\AssignedLeadsController;

// Customer Followup Controller
use App\Http\Controllers\CustomerFollowupController;

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
    // === Serch Customer by Mobile Number either Task Id
    Route::post('task/search', [TaskController::class, 'search'])->name('task.search');

    // ==== Manage Leads
    Route::get('leads/index', [LeadsController::class, 'index'])->name('leads.index');

    // ==== Manage Customer
    Route::get('customer/index', [CustomerController::class, 'index'])->name('customer.index');
    // === Serch Customer by mobile Number
    Route::post('customer/search', [CustomerController::class, 'search'])->name('customer.search');

    // === Sales Reports List with Status
    Route::get('sales-report-list/{task_status?}', [SalesReportController::class,'salesReportList'])->name('sales-report-list.index');
    Route::get('sales-report-list/view/{task_status?}/{task_id?}', [SalesReportController::class,'salesReportView'])->name('sales-report-list.view');
    Route::get('sales-report-list/edit/{task_status?}/{task_id?}', [SalesReportController::class,'salesReportEdit'])->name('sales-report-list.edit');
    Route::post('sales-report-list/update/{task_status?}/{task_id?}', [SalesReportController::class,'salesReportUpdate'])->name('sales-report-list.update');

    // Assigned Leads
    Route::get('leads/assigned-leads', [AssignedLeadsController::class, 'assignedLeads'])->name('leads.assigned-leads');

    // FollowUp On Field Store
    Route::post('followup/store', [CustomerFollowupController::class, 'followUpStore'])->name('followup.store');
});
