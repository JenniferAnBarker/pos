<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    /// Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    /// Admin Routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/logout', 'logoutPage')->name('admin.logout.page');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');

        Route::post('/store/profile', 'store')->name('admin.profile.store');
        Route::post('/update/password', 'updatePassword')->name('update.password');

    });

    /// Employee Routes
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/all/employee', 'all')->name('all.employee');
        Route::get('/add/employee', 'add')->name('add.employee');
        Route::get('/edit/employee/{id}', 'edit')->name('edit.employee');
        Route::get('/employee/delete/{id}', 'delete')->name('delete.employee');

        Route::post('/store/employee', 'store')->name('add.employee.store');
        Route::post('/employee/update', 'update')->name('employee.update');

    });

    /// Customer Routes
    Route::controller(CustomerController::class)->group(function() {
        Route::get('/all/customers', 'all')->name('all.customers');
        Route::get('/add/customer', 'add')->name('add.customer');
        Route::get('/edit/customer/{id}', 'edit')->name('edit.customer');
        Route::get('/customer/delete/{id}', 'delete')->name('delete.customer');

        Route::post('/store/customer', 'store')->name('add.customer.store');
        Route::post('/customer/update', 'update')->name('customer.update');

    });

    /// Supplier routes
    Route::controller(SupplierController::class)->group(function() {
        Route::get('/all/suppliers', 'all')->name('all.suppliers');
        Route::get('/add/supplier', 'add')->name('add.supplier');
        Route::get('/edit/supplier/{id}', 'edit')->name('edit.supplier');
        Route::get('/delete/supplier/{id}', 'delete')->name('delete.supplier');
        Route::get('/supplier/details/{id}', 'details')->name('supplier.details');

        Route::post('/store/supplier', 'store')->name('add.supplier.store');
        Route::post('/update/supplier', 'update')->name('update.supplier');
    });

    /// Salary routes
    Route::controller(SalaryController::class)->group(function() {
        Route::get('/add/salary', 'add')->name('add.advance.salary');

        Route::post('/advance/salary/store', 'store')->name('advance.salary.store');
        
    });
});

require __DIR__.'/auth.php';