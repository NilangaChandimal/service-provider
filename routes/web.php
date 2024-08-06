<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\WorkerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

// Customer routes
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerAuthController::class, 'login']);
    Route::get('register', [CustomerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerAuthController::class, 'register']);
    Route::middleware('auth:customer')->group(function () {
        Route::get('home', [CustomerController::class, 'index'])->name('home');

        Route::get('medicine', [CustomerController::class, 'medicine'])->name('medicine');
        Route::get('engineering', [CustomerController::class, 'engineering'])->name('engineering');
        Route::get('law', [CustomerController::class, 'law'])->name('law');
        Route::get('construction', [CustomerController::class, 'construction'])->name('construction');
        Route::get('homeservice', [CustomerController::class, 'homeservice'])->name('homeservice');
        Route::get('wedding', [CustomerController::class, 'wedding'])->name('wedding');
        Route::get('agriculture', [CustomerController::class, 'agriculture'])->name('agriculture');
        Route::get('rent', [CustomerController::class, 'rent'])->name('rent');
        Route::get('business', [CustomerController::class, 'business'])->name('business');
        Route::get('language', [CustomerController::class, 'language'])->name('language');
        Route::get('delivery', [CustomerController::class, 'delivery'])->name('delivery');
        Route::get('other', [CustomerController::class, 'other'])->name('other');
        
        Route::get('profile', function () {
            return view('customer.profile');
        })->name('profile');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('logout');
        Route::get('chats', [ChatController::class, 'index'])->name('chats.index');
        Route::get('chats/{id}', [ChatController::class, 'show'])->name('chats.show');
        Route::post('chats/{id}/message', [ChatController::class, 'storeMessage'])->name('chats.storeMessage');
        Route::post('chats/start/{worker}', [WorkerController::class, 'startChat'])->name('startChat');
    });
});

// Worker routes
Route::prefix('worker')->name('worker.')->group(function () {
    Route::get('login', [WorkerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [WorkerAuthController::class, 'login']);
    Route::get('register', [WorkerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [WorkerAuthController::class, 'register']);
    Route::middleware('auth:worker')->group(function () {
        Route::get('home', [WorkerController::class, 'index'])->name('home');
        Route::get('profile', function () {
            return view('worker.profile');
        })->name('profile');
        Route::post('logout', [WorkerAuthController::class, 'logout'])->name('logout');
        Route::get('chats', [ChatController::class, 'index'])->name('chats.index');
        Route::get('chats/{id}', [ChatController::class, 'show'])->name('chats.show');
        Route::post('chats/{id}/message', [ChatController::class, 'storeMessage'])->name('chats.storeMessage');
    });
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AdminAuthController::class, 'register']);
    Route::middleware('auth:admin')->group(function () {
        Route::get('home', [AdminController::class, 'index'])->name('home');
        Route::get('profile', function () {
            return view('admin.profile');
        })->name('profile');
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

        
    });
    Route::get('customers', [AdminController::class, 'showCustomers'])->name('customers');
    Route::get('workers', [AdminController::class, 'showWorkers'])->name('workers');


});
