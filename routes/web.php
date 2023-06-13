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
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');

        Route::post('/store/profile', 'store')->name('admin.profile.store');
        Route::post('/update/password', 'updatePassword')->name('update.password');

    });

    /// Employee Routes
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/all/employee', 'all')->name('all.employee')->middleware('permission:employee.all');
        Route::get('/add/employee', 'add')->name('add.employee')->middleware('permission:employee.add');
        Route::get('/edit/employee/{id}', 'edit')->name('edit.employee')->middleware('permission:employee.edit');
        Route::get('/employee/delete/{id}', 'delete')->name('delete.employee')->middleware('permission:employee.delete');

        Route::post('/store/employee', 'store')->name('add.employee.store');
        Route::post('/employee/update', 'update')->name('employee.update');

    });

    /// Customer Routes
    Route::controller(CustomerController::class)->group(function() {
        Route::get('/all/customers', 'all')->name('all.customers')->middleware('permission:customer.all');
        Route::get('/add/customer', 'add')->name('add.customer')->middleware('permission:customer.add');
        Route::get('/edit/customer/{id}', 'edit')->name('edit.customer')->middleware('permission:customer.edit');
        Route::get('/customer/delete/{id}', 'delete')->name('delete.customer')->middleware('permission:customer.delete');

        Route::post('/store/customer', 'store')->name('add.customer.store');
        Route::post('/customer/update', 'update')->name('customer.update');

    });

    /// Supplier routes
    Route::controller(SupplierController::class)->group(function() {
        Route::get('/all/suppliers', 'all')->name('all.suppliers')->middleware('permission:supplier.all');
        Route::get('/add/supplier', 'add')->name('add.supplier')->middleware('permission:supplier.add');
        Route::get('/edit/supplier/{id}', 'edit')->name('edit.supplier')->middleware('permission:supplier.edit');
        Route::get('/delete/supplier/{id}', 'delete')->name('delete.supplier')->middleware('permission:supplier.delete');
        Route::get('/supplier/details/{id}', 'details')->name('supplier.details')->middleware('permission:supplier.all');

        Route::post('/store/supplier', 'store')->name('add.supplier.store');
        Route::post('/update/supplier', 'update')->name('update.supplier');
    });

    /// Advance Salary routes
    Route::controller(SalaryController::class)->group(function() {
        Route::get('/all/advance', 'all')->name('all.advance.salary')->middleware('permission:salary.all');
        Route::get('/add/advance', 'add')->name('add.advance.salary')->middleware('permission:salary.add');
        Route::get('/edit/advance/{id}', 'edit')->name('edit.advance.salary')->middleware('permission:salary.edit');
        Route::get('/delete/advance/{id}', 'delete')->name('delete.advance.salary')->middleware('permission:salary.delete');

        Route::post('/advance/salary/store', 'store')->name('advance.salary.store');
        Route::post('/advance/salary/update', 'update')->name('advance.salary.update');
        
    /// Pay Salary routes
        Route::get('/pay/salary', 'pay')->name('pay.salary')->middleware('permission:salary.pay');
        Route::get('/pay/now/salary/{id}', 'paynow')->name('pay.now.salary')->middleware('permission:salary.pay');
        Route::get('/previous/salary', 'previous')->name('previous.salary')->middleware('permission:salary.paid');
        Route::get('/previous/paid/salary/{id}', 'previousPaid')->name('previous.paid.month')->middleware('permission:salary.paid');

        Route::post('/employee/salary/store', 'storeSalary')->name('employee.salary.store');
   });

    /// Attendance Routes
    Route::controller(AttendanceController::class)->group(function(){
        Route::get('/employee/attendance/list', 'attendanceList')->name('employee.attendance.list')->middleware('permission:attendance.menu');
        Route::get('/employee/attendance/add', 'attendanceAdd')->name('add.employee.attendance')->middleware('permission:attendance.menu');
        Route::get('/employee/attendance/edit/{date}', 'attendanceEdit')->name('employee.attendance.edit')->middleware('permission:attendance.menu');
        Route::get('/employee/attendance/view/{date}', 'attendanceView')->name('employee.attendance.view')->middleware('permission:attendance.menu');

        Route::post('/employee/attendance/store', 'store')->name('employee.attendance.store');

    });

    /// Category routes
    Route::controller(CategoryController::class)->group(function() {
        Route::get('/all/categories', 'all')->name('all.category')->middleware('permission:category.menu');
        Route::get('/edit/categoriy/{id}', 'edit')->name('edit.category')->middleware('permission:category.menu');
        Route::get('/delete/category/{id}', 'delete')->name('delete.category')->middleware('permission:category.menu');

        Route::post('/store/cateogry', 'store')->name('store.category');
        Route::post('/update/cateogry', 'update')->name('category.update');
    });

    /// Product Routes
    Route::controller(ProductController::class)->group(function() {
        Route::get('/all/product', 'all')->name('all.product')->middleware('permission:product.menu');
        Route::get('/add/product', 'add')->name('add.product')->middleware('permission:product.menu');
        Route::get('/edit/product/{id}', 'edit')->name('edit.product')->middleware('permission:product.menu');
        Route::get('/delete/product/{id}', 'delete')->name('delete.product')->middleware('permission:product.menu');
        Route::get('/code/product/{id}', 'code')->name('code.product')->middleware('permission:product.menu');
        Route::get('/import/product', 'importProduct')->name('import.product')->middleware('permission:product.menu');
        Route::get('/export', 'export')->name('export')->middleware('permission:product.menu');
        
        Route::post('/product/store', 'store')->name('product.store');
        Route::post('/product/update', 'update')->name('product.update');
        Route::post('/import', 'import')->name('import');
    });

    /// Expense Routes
    Route::controller(ExpenseController::class)->group(function() {
        Route::get('/add/expense', 'add')->name('add.expense')->middleware('permission:expense.menu');
        Route::get('/daily/expense', 'daily')->name('daily.expense')->middleware('permission:expense.menu');
        Route::get('/month/expense', 'month')->name('month.expense')->middleware('permission:expense.menu');
        Route::get('/year/expense', 'year')->name('year.expense')->middleware('permission:expense.menu');
        Route::get('/edit/expense/{id}', 'edit')->name('edit.expense')->middleware('permission:expense.menu');

        Route::post('/store/expense', 'store')->name('store.expense');
        Route::post('/update/expense', 'update')->name('update.expense');
       
    });

    /// POS Routes
    Route::controller(PosController::class)->group(function() {
        Route::get('/pos', 'pos')->name('pos')->middleware('permission:pos.menu');
        Route::get('/text-all-item', 'textItem')->middleware('permission:pos.menu');
        Route::get('/cart-remove/{rowId}', 'removeItem')->middleware('permission:pos.menu');

        Route::post('/add-cart', 'addCart');
        Route::post('/cart-update/{rowId}', 'updateCart');
        Route::post('/create-invoice', 'createInvoice');
    });

    /// Order Routes
    Route::controller(OrderController::class)->group(function() {
        Route::get('/orders/pending', 'pending')->name('pending.orders')->middleware('permission:orders.menu');
        Route::get('/orders/complete', 'complete')->name('complete.orders')->middleware('permission:orders.menu');
        Route::get('/order/details/{order_id}', 'details')->name('order.details')->middleware('permission:orders.menu');

        Route::post('/final-invoice', 'finalInvoice');
        Route::post('/order/status/update', 'statusUpdate')->name('order.status.update');
       
        /// Stock Routes
        Route::get('/stock/manage', 'manageStock')->name('manage.stock')->middleware('permission:stock.menu');
        Route::get('/order/invoice-download/{order_id}', 'downloadInvoice')->middleware('permission:stock.menu');
       
        /// Due Routes
        Route::get('/due/pending', 'pendingDue')->name('pending.due')->middleware('permission:orders.menu');
        Route::get('/order/due/{id}', 'orderDueAjax')->middleware('permission:orders.menu');

        Route::post('/due/update', 'updateDue')->name('update.due');
    });

    /// Permission & Role Routes
    Route::controller(RoleController::class)->group(function() {
        Route::get('/permissions/all', 'per_all')->name('all.permissions')->middleware('permission:roles.menu');
        Route::get('/permissions/add', 'per_add')->name('add.permissions')->middleware('permission:roles.menu');
        Route::get('/permissions/edit/{id}', 'per_edit')->name('edit.permissions')->middleware('permission:roles.menu');
        Route::get('/permissions/delete/{id}', 'per_delete')->name('delete.permission')->middleware('permission:roles.menu');
        Route::get('/roles/all', 'role_all')->name('all.roles')->middleware('permission:roles.menu');
        Route::get('/roles/add', 'role_add')->name('add.roles')->middleware('permission:roles.menu');
        Route::get('/roles/edit/{id}', 'role_edit')->name('edit.role')->middleware('permission:roles.menu');
        Route::get('/roles/delete/{id}', 'role_delete')->name('delete.role')->middleware('permission:roles.menu');

        Route::post('/permissions/store', 'per_store')->name('permission.store');
        Route::post('/permissions/update', 'per_update')->name('permission.update');
        Route::post('/roles/store', 'role_store')->name('role.store');
        Route::post('/roles/update', 'role_update')->name('role.update');
        
        /// Permission & Role Routes
        Route::get('/roles-permission/add', 'rp_add')->name('add.roles.permission')->middleware('permission:roles.menu');
        Route::get('/roles-permission/all', 'rp_all')->name('all.roles.permission')->middleware('permission:roles.menu');
        Route::get('/roles-permission/edit/{id}', 'rp_edit')->name('admin.edit.roles')->middleware('permission:roles.menu');
        Route::get('/roles-permission/delete/{id}', 'rp_delete')->name('admin.delete.roles')->middleware('permission:roles.menu');
        
        Route::post('/roles-permission/store', 'rp_store')->name('role.permission.store');
        Route::post('/roles-permission/update/{id}', 'rp_update')->name('role.permission.update');
    });

    /// Admin User Routes
    Route::controller(AdminController::class)->group(function() {
        Route::get('/admin/all', 'au_all')->name('all.admin');
        Route::get('/admin/add', 'au_add')->name('add.admin');
        Route::get('/admin/edit/{id}', 'au_edit')->name('edit.admin');
        Route::get('/admin/delete/{id}', 'au_delete')->name('delete.admin');

        Route::post('/admin/store', 'au_store')->name('admin.store');
        Route::post('/admin/update', 'au_update')->name('admin.update');
       
    });
});
 

require __DIR__.'/auth.php';