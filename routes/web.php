<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ClassRoomController;
use App\Http\Controllers\Dashboard\CourseController;
use App\Http\Controllers\Dashboard\GradeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\RoomController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\TeacherController;
use App\Http\Controllers\Dashboard\UserController;
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


Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Route::get('login', [AuthController::class , 'showLoginForm'])->name('login');


Route::prefix('admin')->middleware('localization')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class , 'login'])->name('login.post');



    /* Dashboard Routes */
    Route::middleware('auth:admin')->group(function () {

        Route::get('/home', [HomeController::class , 'home'])->name('home');
        Route::get('logout', [AuthController::class , 'logout'])->name('logout');

        // roles
        Route::resource('roles', RoleController::class)->name('*','roles');
        Route::get('get-roles' , [RoleController::class , 'get_roles'])->name('get-roles');

        // admins
        Route::resource('/admins' , AdminController::class);
        Route::get('get-admin' , [AdminController::class , 'get_admins'])->name('get-admins');



        // users
        Route::resource('/users' , UserController::class);
        Route::get('get-users'   , [UserController::class , 'get_users'])->name('get-users');
        Route::get('/changeActiveUser', [UserController::class , 'changeActiveUser'])->name('changeActiveUser');

        // grades
        Route::resource('/grades' , GradeController::class);
        Route::get('get-grades'   , [GradeController::class , 'get_grades'])->name('get-grades');

        // class-rooms
        Route::resource('/class-rooms' , ClassRoomController::class);
        Route::get('get-class-rooms'   , [ClassRoomController::class , 'get_class_rooms'])->name('get-class-rooms');
        Route::get('/grade-rooms/{grade_id}' , [ClassRoomController::class , 'classrooms']);

        // sections
        Route::resource('/sections' , SectionController::class);
        Route::get('get-sections'   , [SectionController::class , 'get_sections'])->name('get-sections');

        // teachers
        Route::resource('/teachers' , TeacherController::class);
        Route::get('get-teachers'   , [TeacherController::class , 'get_teachers'])->name('get-teachers');

        // rooms
        Route::resource('/rooms' , RoomController::class);
        Route::get('get-rooms'   , [RoomController::class , 'get_rooms'])->name('get-rooms');

        // courses
        Route::resource('/courses' , CourseController::class);
        Route::get('get-courses'   , [CourseController::class , 'get_courses'])->name('get-courses');


        Route::get ('setting' , [SettingController::class , 'setting'])->name('setting');
        Route::put('update-setting' , [SettingController::class , 'store_setting'])->name('update-setting');

        Route::get ('static' , [SettingController::class , 'static'])->name('static');
        Route::put('update-static' , [SettingController::class , 'update_static'])->name('update-static');

        Route::get ('static-page' , [SettingController::class , 'static_page'])->name('static-page');
        Route::put('update-static-page' , [SettingController::class , 'update_static_page'])->name('update-static-page');

    });


});

