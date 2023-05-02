<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\EmployeeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
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
    });
});

require __DIR__.'/auth.php';


