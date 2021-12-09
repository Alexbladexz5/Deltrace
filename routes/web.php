<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::resource('/admin-panel/users', UserController::class);
//Route::get('/admin-panel/users', [UserController::class, 'index'])-> name('show.viewUsers');

Route::get('/admin-panel/routes', function() {
    return view('layouts/routes/index');
})->name('routes')->middleware('auth');

Route::get('/admin-panel/getUsers', [UserController::class, 'getUsers'])-> name('users.getList');
//Route::post('/admin-panel/users/{user}', [UserController::class, 'store']) -> name('user.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('layouts/admin');
})->name('dashboard');