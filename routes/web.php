<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\DashboardController;
use App\Http\Controllers\admins\DeviceTypeController;
use App\Http\Controllers\admins\DeviceController;
use App\Http\Controllers\admins\ServiceController;
use App\Http\Controllers\admins\NumberController;
use App\Http\Controllers\admins\ReportController;
use App\Http\Controllers\admins\RightFunctionController;
use App\Http\Controllers\admins\RightController;
use App\Http\Controllers\admins\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\checkLogin;
use App\Http\Controllers\admins\ActivityLogController;
use App\Http\Controllers\Auth\ForgotPasswordController;



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

Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::middleware([checkLogin::class])->group(function () {
    Route::prefix('admins')->name('admins.')->group(function() {
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/createChart', [DashboardController::class, 'createChart'])->name('createChart');
        Route::get('/chartDay', [DashboardController::class, 'chartDay'])->name('chartDay');
        Route::get('/chartWeek', [DashboardController::class, 'chartWeek'])->name('chartWeek');
        Route::get('/chartMonth', [DashboardController::class, 'chartMonth'])->name('chartMonth');

        Route::prefix('diary')->name('diary.')->group(function() {

            Route::get('/list', [ActivityLogController::class, 'index'])->name('list');

            Route::get('/getMore', [ActivityLogController::class, 'getMore'])->name('getMore');
        });

        Route::prefix('right_functions')->name('right_functions.')->group(function() {

            Route::get('/list', [RightFunctionController::class, 'index'])->name('list');

            Route::get('/add', [RightFunctionController::class, 'add'])->name('add');

            Route::post('/add', [RightFunctionController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [RightFunctionController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [RightFunctionController::class, 'update'])->name('update');

            Route::get('/delete/{id}', [RightFunctionController::class, 'delete'])->name('delete');
        });

        Route::prefix('rights')->name('rights.')->group(function() {

            Route::get('/list', [RightController::class, 'index'])->name('list');

            Route::get('/getMore', [RightController::class, 'getMore'])->name('getMore');

            Route::get('/add', [RightController::class, 'add'])->name('add');

            Route::post('/add', [RightController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [RightController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [RightController::class, 'update'])->name('update');

            Route::get('/delete/{id}', [RightController::class, 'delete'])->name('delete');
        });

        Route::prefix('accounts')->name('accounts.')->group(function() {

            Route::get('/list', [AccountController::class, 'index'])->name('list');

            Route::get('/getMore', [AccountController::class, 'getMore'])->name('getMore');

            Route::get('/add', [AccountController::class, 'add'])->name('add');

            Route::post('/add', [AccountController::class, 'store'])->name('store');

            Route::get('/detail', [AccountController::class, 'detail'])->name('detail');

            Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [AccountController::class, 'update'])->name('update');
        });

        Route::prefix('device_types')->name('device_types.')->group(function() {

            Route::get('/list', [DeviceTypeController::class, 'index'])->name('list');

            Route::get('/getMore', [DeviceTypeController::class, 'getMore'])->name('getMore');

            Route::get('/add', [DeviceTypeController::class, 'add'])->name('add');

            Route::post('/add', [DeviceTypeController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [DeviceTypeController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [DeviceTypeController::class, 'update'])->name('update');

            Route::get('/delete/{id}', [DeviceTypeController::class, 'delete'])->name('delete');
        });

        Route::prefix('devices')->name('devices.')->group(function() {

            Route::get('/list', [DeviceController::class, 'index'])->name('list');

            Route::get('/getMore', [DeviceController::class, 'getMore'])->name('getMore');

            Route::get('/add', [DeviceController::class, 'add'])->name('add');

            Route::post('/add', [DeviceController::class, 'store'])->name('store');

            Route::get('/detail/{id}', [DeviceController::class, 'detail'])->name('detail');

            Route::get('/edit/{id}', [DeviceController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [DeviceController::class, 'update'])->name('update');

        });

        Route::prefix('rules')->name('rules.')->group(function() {

            Route::get('/list', [RuleController::class, 'index'])->name('list');

            Route::get('/getMore', [RuleController::class, 'getMore'])->name('getMore');

            Route::get('/add', [RuleController::class, 'add'])->name('add');

            Route::post('/add', [RuleController::class, 'store'])->name('store');

            Route::get('/edit/{id}', [RuleController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [RuleController::class, 'update'])->name('update');

            Route::get('/delete/{id}', [RuleController::class, 'delete'])->name('delete');

        });

        Route::prefix('services')->name('services.')->group(function() {

            Route::get('/list', [ServiceController::class, 'index'])->name('list');

            Route::get('/getMore', [ServiceController::class, 'getMore'])->name('getMore');

            Route::get('/add', [ServiceController::class, 'add'])->name('add');

            Route::post('/add', [ServiceController::class, 'store'])->name('store');

            Route::get('/detail/{id}', [ServiceController::class, 'detail'])->name('detail');

            Route::get('/getMoreDetail/{id}', [ServiceController::class, 'getMoreDetail'])->name('getMoreDetail');

            Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');

            Route::post('/edit/{id}', [ServiceController::class, 'update'])->name('update');

        });

        Route::prefix('numbers')->name('numbers.')->group(function() {

            Route::get('/list', [NumberController::class, 'index'])->name('list');

            Route::get('/getMore', [NumberController::class, 'getMore'])->name('getMore');

            Route::get('/add', [NumberController::class, 'add'])->name('add');

            Route::post('/add', [NumberController::class, 'store'])->name('store');

            Route::get('/popup', [NumberController::class, 'popup'])->name('popup');

            Route::get('/notify', [NumberController::class, 'notify'])->name('notify');

            Route::get('/detail/{id}', [NumberController::class, 'detail'])->name('detail');
        });

        Route::prefix('reports')->name('reports.')->group(function() {
            Route::get('/list', [ReportController::class, 'index'])->name('list');

            Route::get('/getMore', [ReportController::class, 'getMore'])->name('getMore');
        });

    });
});



