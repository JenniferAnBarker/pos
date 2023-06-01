<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\PosController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SalaryController;
use App\Http\Controllers\Backend\ExpenseController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\RoleController;

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

    /// Advance Salary routes
    Route::controller(SalaryController::class)->group(function() {
        Route::get('/add/advance', 'add')->name('add.advance.salary');
        Route::get('/all/advance', 'all')->name('all.advance.salary');
        Route::get('/edit/advance/{id}', 'edit')->name('edit.advance.salary');
        Route::get('/delete/advance/{id}', 'delete')->name('delete.advance.salary');

        Route::post('/advance/salary/store', 'store')->name('advance.salary.store');
        Route::post('/advance/salary/update', 'update')->name('advance.salary.update');
        
    /// Pay Salary routes
        Route::get('/pay/salary', 'pay')->name('pay.salary');
        Route::get('/pay/now/salary/{id}', 'paynow')->name('pay.now.salary');
        Route::get('/previous/salary', 'previous')->name('previous.salary');
        Route::get('/previous/paid/salary/{id}', 'previousPaid')->name('previous.paid.month');

        Route::post('/employee/salary/store', 'storeSalary')->name('employee.salary.store');
   });

    /// Attendance Routes
    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/employee/attendance/list', 'attendanceList')->name('employee.attendance.list');
        Route::get('/employee/attendance/add', 'attendanceAdd')->name('add.employee.attendance');
        Route::get('/employee/attendance/edit/{date}', 'attendanceEdit')->name('employee.attendance.edit');
        Route::get('/employee/attendance/view/{date}', 'attendanceView')->name('employee.attendance.view');

        Route::post('/employee/attendance/store', 'store')->name('employee.attendance.store');

    });

    /// Category routes
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/all/categories', 'all')->name('all.category');
        Route::get('/edit/categoriy/{id}', 'edit')->name('edit.category');
        Route::get('/delete/category/{id}', 'delete')->name('delete.category');

        Route::post('/store/cateogry', 'store')->name('store.category');
        Route::post('/update/cateogry', 'update')->name('category.update');
    });

    /// Product Routes
    Route::controller(ProductController::class)->group(function() {
        Route::get('/all/product', 'all')->name('all.product');
        Route::get('/add/product', 'add')->name('add.product');
        Route::get('/edit/product/{id}', 'edit')->name('edit.product');
        Route::get('/delete/product/{id}', 'delete')->name('delete.product');
        Route::get('/code/product/{id}', 'code')->name('code.product');
        Route::get('/import/product', 'importProduct')->name('import.product');
        Route::get('/export', 'export')->name('export');
        
        Route::post('/product/store', 'store')->name('product.store');
        Route::post('/product/update', 'update')->name('product.update');
        Route::post('/import', 'import')->name('import');
    });

    /// Expense Routes
    Route::controller(ExpenseController::class)->group(function() {
        Route::get('/add/expense', 'add')->name('add.expense');
        Route::get('/daily/expense', 'daily')->name('daily.expense');
        Route::get('/month/expense', 'month')->name('month.expense');
        Route::get('/year/expense', 'year')->name('year.expense');
        Route::get('/edit/expense/{id}', 'edit')->name('edit.expense');

        Route::post('/store/expense', 'store')->name('store.expense');
        Route::post('/update/expense', 'update')->name('update.expense');
       
    });

    /// POS Routes
    Route::controller(PosController::class)->group(function() {
        Route::get('/pos', 'pos')->name('pos');
        Route::get('/text-all-item', 'textItem');
        Route::get('/cart-remove/{rowId}', 'removeItem');

        Route::post('/add-cart', 'addCart');
        Route::post('/cart-update/{rowId}', 'updateCart');
        Route::post('/create-invoice', 'createInvoice');
    });

    /// Order Routes
    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders/pending', 'pending')->name('pending.orders');
        Route::get('/orders/complete', 'complete')->name('complete.orders');
        Route::get('/order/details/{order_id}', 'details')->name('order.details');

        Route::post('/final-invoice', 'finalInvoice');
        Route::post('/order/status/update', 'statusUpdate')->name('order.status.update');
       
        /// Stock Routes
        Route::get('/stock/manage', 'manageStock')->name('manage.stock');
        Route::get('/order/invoice-download/{order_id}', 'downloadInvoice');
    });

    /// Role Routes
    Route::controller(RoleController::class)->group(function() {
        Route::get('/permissions/all', 'all')->name('all.permissions');
        
    });
});
 

require __DIR__.'/auth.php';