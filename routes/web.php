<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});

Auth::routes();

// customer routes
Route::group(['middleware' => 'auth:customer'], function () {
    Route::view('/customer', 'customer.index');
});

// customer login routes
Route::prefix('login')->group(function () {
    Route::get('/customer', [LoginController::class,'showCustomerLoginForm'])->name('customer.login');
    Route::post('/customer', [LoginController::class,'customerLogin']);
});

// customer register routes
Route::get('/register/customer', [RegisterController::class,'showCustomerRegisterForm'])->name('customer.registration');
Route::post('/register/customer', [RegisterController::class,'createCustomer']);

// end of customer routes


// admin routes
Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function () {

    Route::get('/dashboard/destroy/{customer}',[AdminController::class,'destroy'])->name('dashboard.delete');
    Route::resource('/dashboard', AdminController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
