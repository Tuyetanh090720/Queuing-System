<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\DeviceTypeController;
use App\Http\Controllers\admins\DeviceController;
use App\Http\Controllers\admins\ServiceController;
use App\Http\Controllers\admins\NumberController;
use App\Http\Controllers\admins\ReportController;
use App\Http\Controllers\admins\RightController;
use App\Http\Controllers\admins\AccountController;
use App\Http\Controllers\Auth\LoginController;




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

Route::prefix('admins')->name('admins.')->group(function() {
    Route::get('/', function(){
        return view('/admins/dashboard');
    });

    Route::prefix('accounts')->name('accounts.')->group(function() {

        Route::get('/list', [AccountController::class, 'index'])->name('list');

        Route::get('/getMore', [AccountController::class, 'getMore'])->name('getMore');

        Route::get('/add', [AccountController::class, 'add'])->name('add');

        Route::post('/add', [AccountController::class, 'store'])->name('store');

        Route::get('/detail/{id}', [AccountController::class, 'detail'])->name('detail');

        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');

        Route::post('/edit/{id}', [AccountController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('delete');

        Route::get('/diary', [AccountController::class, 'diary'])->name('diary');
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

        Route::get('/add', [DeviceController::class, 'add'])->name('add');

        Route::post('/add', [DeviceController::class, 'store'])->name('store');

        Route::get('/detail/{id}', [DeviceController::class, 'detail'])->name('detail');

        Route::get('/edit/{id}', [DeviceController::class, 'edit'])->name('edit');

        Route::post('/edit/{id}', [DeviceController::class, 'update'])->name('update');

        // Route::get('/delete/{id}', [DeviceController::class, 'delete'])->name('delete');
    });

    Route::prefix('services')->name('services.')->group(function() {

        Route::get('/list', [ServiceController::class, 'index'])->name('list');

        Route::get('/add', [ServiceController::class, 'add'])->name('add');

        // Route::post('/add', [ServiceController::class, 'store'])->name('store');

        Route::get('/detail/{id}', [ServiceController::class, 'detail'])->name('detail');

        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');

        // Route::post('/edit/{id}', [ServiceController::class, 'update'])->name('update');

        // Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('delete');
    });

    Route::prefix('numbers')->name('numbers.')->group(function() {

        Route::get('/list', [NumberController::class, 'index'])->name('list');

        Route::get('/add', [NumberController::class, 'add'])->name('add');

        // Route::post('/add', [NumberController::class, 'store'])->name('store');

        Route::get('/detail/{id}', [NumberController::class, 'detail'])->name('detail');

        Route::get('/edit/{id}', [NumberController::class, 'edit'])->name('edit');

        // Route::post('/edit/{id}', [NumberController::class, 'update'])->name('update');

        // Route::get('/delete/{id}', [NumberController::class, 'delete'])->name('delete');

    });

    Route::get('/reports', [NumberController::class, 'reports'])->name('reports');

    Route::prefix('rights')->name('rights.')->group(function() {

        Route::get('/list', [RightController::class, 'index'])->name('list');

        Route::get('/add', [RightController::class, 'add'])->name('add');

        Route::post('/add', [RightController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [RightController::class, 'edit'])->name('edit');

        Route::post('/edit/{id}', [RightController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [RightController::class, 'delete'])->name('delete');
    });
});

Auth::routes();

Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');



Route::get('/login', function(){
    return view('/admins/login');
});
Route::get('/forget', function(){
    return view('/admins/forgetPW');
});
