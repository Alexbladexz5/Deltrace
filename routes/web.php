<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DeliveryController;

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

/**
 * Enrutador del panel de adminitración
 *  */
Route::get('/', function () {
    return view('/auth/login');
});
Route::get('/logout', function () {
    return view('/auth/login');
});
Route::get('/admin-panel', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/admin/profile', function() {
    return view('layouts/profile');
})->name('profile')->middleware('auth');

Route::resource('/admin-panel/users', UserController::class)->middleware('auth');
//Route::get('/admin-panel/users', [UserController::class, 'index'])-> name('show.viewUsers');
Route::get('/admin-panel/getUsers', [UserController::class, 'getUsers'])->name('users.getList')->middleware('auth');
//Route::post('/admin-panel/users/{user}', [UserController::class, 'store']) -> name('user.store');

Route::resource('/admin-panel/routes', RouteController::class)->middleware('auth');
Route::get('/admin-panel/getRoutes', [RouteController::class, 'getRoutes'])->name('routes.getList')->middleware('auth');

Route::resource('/admin-panel/deliveries', DeliveryController::class)->middleware('auth');
Route::get('/admin-panel/getDeliveries', [DeliveryController::class, 'getDeliveries'])->name('deliveries.getList')->middleware('auth');
Route::get('/admin-panel/getDeliveries/{delivery}', [DeliveryController::class, 'getDeliveriesRoute'])->name('deliveries.getRoute')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts/admin');
})->name('dashboard');