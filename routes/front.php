<?php

use App\Http\Controllers\FrontEnd\AuthController;
use App\Http\Controllers\FrontEnd\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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








Route::get('/' , [HomeController::class , 'home'])->name('user.home');
Route::prefix('user')->middleware('localization')->name('user.')->group(function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class , 'login'])->name('login.post');

    Route::get('/register', [AuthController::class , 'show_register'])->name('register');
    Route::post('register', [AuthController::class , 'register'])->name('register.post');

    /* Dashboard Routes */
    Route::middleware('auth')->group(function () {

        // Route::get('/home', [HomeController::class , 'home'])->name('home');
        Route::get('logout', [AuthController::class , 'logout'])->name('logout');
    });


});


Route::get('course-details/{id}' , [HomeController::class , 'course_details'])->name('course-details');

