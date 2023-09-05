<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\DayController;
use App\Http\Controllers\Admin\LecturersController;
use App\Http\Controllers\admin\PengajuanTimenotavailableController;
use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\TimedayController;
use App\Http\Controllers\Admin\TimenotavailableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'], function () {
    Route::get('/', ['as' => 'admin.login', 'uses' => 'AuthController@index']);
    Route::post('/submit', ['as' => 'admin.login.submit', 'uses' => 'AuthController@login']);


    Route::group(['middleware' => ['auth.admin'], 'prefix' => 'admin'], function () {
        Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'SiteController@index']);

        // AJAX
        Route::get('ajax/user/email', ['as' => 'ajax.user.email', 'uses' => 'AjaxController@EmailUser']);
        Route::get('ajax/lecturer/email', ['as' => 'ajax.lecturer.email', 'uses' => 'AjaxController@EmailLecturer']);
        Route::get('ajax/lecturer/nidn', ['as' => 'ajax.lecturer.nidn', 'uses' => 'AjaxController@NidnLecturer']);
        Route::get('ajax/course/name', ['as' => 'ajax.course.name', 'uses' => 'AjaxController@NameCourses']);
        Route::get('ajax/course/code', ['as' => 'ajax.course.code', 'uses' => 'AjaxController@CodeCourses']);
        Route::get('ajax/room/name', ['as' => 'ajax.room.name', 'uses' => 'AjaxController@NameRooms']);
        Route::get('ajax/room/code', ['as' => 'ajax.room.code', 'uses' => 'AjaxController@CodeRooms']);
        Route::get('ajax/teach/courses', ['as' => 'ajax.teach.courses', 'uses' => 'AjaxController@Teachsroom']);

        // User
        Route::get('users', ['as' => 'admin.user', 'uses' => 'UserController@index']);
        Route::get('users/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);
        Route::post('users/create', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
        Route::get('users/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);
        Route::post('users/update/{id?}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);


        //Day
        Route::get('days', ['as' => 'admin.days', 'uses' => 'DayController@index']);
        Route::get('days/create', ['as' => 'admin.day.create', 'uses' => 'DayController@create']);
        Route::post('days/create', ['as' => 'admin.day.store', 'uses' => 'DayController@store']);
        Route::get('days/edit/{id}', ['as' => 'admin.day.edit', 'uses' => 'DayController@edit']);
        Route::post('days/update/{id?}', ['as' => 'admin.day.update', 'uses' => 'DayController@update']);


        //Time
        Route::get('times', ['as' => 'admin.times', 'uses' => 'TimeController@index']);
        Route::get('times/create', ['as' => 'admin.time.create', 'uses' => 'TimeController@create']);
        Route::post('times/create', ['as' => 'admin.time.store', 'uses' => 'TimeController@store']);
        Route::get('times/edit/{id}', ['as' => 'admin.time.edit', 'uses' => 'TimeController@edit']);
        Route::post('times/update/{id?}', ['as' => 'admin.time.update', 'uses' => 'TimeController@update']);


        //Lecturer
        Route::get('lecturers', ['as' => 'admin.lecturers', 'uses' => 'LecturersController@index']);
        Route::get('lecturers/create', ['as' => 'admin.lecturer.create', 'uses' => 'LecturersController@create']);
        Route::post('lecturers/create', ['as' => 'admin.lecturer.store', 'uses' => 'LecturersController@store']);
        Route::get('lecturers/edit/{id}', ['as' => 'admin.lecturer.edit', 'uses' => 'LecturersController@edit']);
        Route::post('lecturers/update/{id?}', ['as' => 'admin.lecturer.update', 'uses' => 'LecturersController@update']);


        //Courses
        Route::get('courses', ['as' => 'admin.courses', 'uses' => 'CoursesController@index']);
        Route::get('courses/create', ['as' => 'admin.courses.create', 'uses' => 'CoursesController@create']);
        Route::post('courses/create', ['as' => 'admin.courses.store', 'uses' => 'CoursesController@store']);
        Route::get('courses/edit/{id}', ['as' => 'admin.courses.edit', 'uses' => 'CoursesController@edit']);
        Route::post('courses/update/{id?}', ['as' => 'admin.courses.update', 'uses' => 'CoursesController@update']);


        //Room
        Route::get('rooms', ['as' => 'admin.rooms', 'uses' => 'RoomsController@index']);
        Route::get('rooms/create', ['as' => 'admin.room.create', 'uses' => 'RoomsController@create']);
        Route::post('rooms/create', ['as' => 'admin.room.store', 'uses' => 'RoomsController@store']);
        Route::get('rooms/edit/{id}', ['as' => 'admin.room.edit', 'uses' => 'RoomsController@edit']);
        Route::post('rooms/update/{id?}', ['as' => 'admin.room.update', 'uses' => 'RoomsController@update']);


        //Teach
        Route::get('teachs', ['as' => 'admin.teachs', 'uses' => 'TeachController@index']);
        Route::get('teachs/create', ['as' => 'admin.teach.create', 'uses' => 'TeachController@create']);
        Route::post('teachs/create', ['as' => 'admin.teach.store', 'uses' => 'TeachController@store']);
        Route::get('teachs/edit/{id}', ['as' => 'admin.teach.edit', 'uses' => 'TeachController@edit']);
        Route::post('teachs/update/{id?}', ['as' => 'admin.teach.update', 'uses' => 'TeachController@update']);
        Route::delete('teachs/delete/{id}', ['as' => 'admin.teach.delete', 'uses' => 'TeachController@destroy']);

        //TimesNotAvailable
        Route::get('timenotavailable', ['as' => 'admin.timenotavailables', 'uses' => 'TimenotavailableController@index']);
        Route::get('timenotavailable/create', ['as' => 'admin.timenotavailable.create', 'uses' => 'TimenotavailableController@create']);
        Route::post('timenotavailable/create', ['as' => 'admin.timenotavailable.store', 'uses' => 'TimenotavailableController@store']);
        Route::get('timenotavailable/edit/{id}', ['as' => 'admin.timenotavailable.edit', 'uses' => 'TimenotavailableController@edit']);
        Route::post('timenotavailable/update/{id?}', ['as' => 'admin.timenotavailable.update', 'uses' => 'TimenotavailableController@update']);


        // Pengajuan TimesNotAvailable
        Route::get('pengajuantimenotavailable', ['as' => 'admin.pengajuantimenotavailables', 'uses' => 'PengajuanTimenotavailableController@index']);
        Route::get('pengajuantimenotavailable/create', ['as' => 'admin.pengajuantimenotavailable.create', 'uses' => 'PengajuanTimenotavailableController@create']);
        Route::post('pengajuantimenotavailable/create', ['as' => 'admin.pengajuantimenotavailable.store', 'uses' => 'PengajuanTimenotavailableController@store']);
        Route::get('pengajuantimenotavailable/edit/{id}', ['as' => 'admin.pengajuantimenotavailable.edit', 'uses' => 'PengajuanTimenotavailableController@edit']);
        Route::post('pengajuantimenotavailable/update/{id?}', ['as' => 'admin.pengajuantimenotavailable.update', 'uses' => 'PengajuanTimenotavailableController@update']);


        //timedays
        Route::get('timedays', ['as' => 'admin.timedays', 'uses' => 'TimedayController@index']);
        Route::get('timedays/create', ['as' => 'admin.timeday.create', 'uses' => 'TimedayController@create']);
        Route::post('timedays/create', ['as' => 'admin.timeday.store', 'uses' => 'TimedayController@store']);
        Route::get('timedays/edit/{id}', ['as' => 'admin.timeday.edit', 'uses' => 'TimedayController@edit']);
        Route::post('timedays/update/{id?}', ['as' => 'admin.timeday.update', 'uses' => 'TimedayController@update']);
        Route::delete('timedays/delete/{id}', ['as' => 'admin.timeday.delete', 'uses' => 'TimedayController@destroy']);

        //generate
        Route::get('generates', ['as' => 'admin.generates', 'uses' => 'GenetikController@index']);
        Route::get('generates/submit', ['as' => 'admin.generates.submit', 'uses' => 'GenetikController@submit']);
        Route::get('generates/result/{id}', ['as' => 'admin.generates.result', 'uses' => 'GenetikController@result']);
        Route::get('generates/excel/{id}', ['as' => 'admin.generates.excel', 'uses' => 'GenetikController@excel']);
    });
});


Route::controller(LecturersController::class)->group(function () {
    Route::get('lecturers/delete/{id}', 'destroy')->name('admin.lecturer.delete');
});

Route::controller(CoursesController::class)->group(function () {
    Route::get('courses/delete/{id}', 'destroy')->name('admin.courses.delete');
});

Route::controller(TimeController::class)->group(function () {
    Route::get('times/delete/{id}', 'destroy')->name('admin.time.delete');
});

Route::controller(DayController::class)->group(function () {
    Route::get('days/delete/{id}', 'destroy')->name('admin.day.delete');
});


Route::controller(TimenotavailableController::class)->group(function () {
    Route::get('timenotavailable/delete/{id}', 'destroy')->name('admin.timenotavailable.delete');
});

Route::controller(PengajuanTimenotavailableController::class)->group(function () {
    Route::get('/pengajuantimenotavailable/delete/{id}', 'destroy')->name('admin.pengajuantimenotavailable.delete');
    Route::get('/pengajuantimenotavailable/ditolak/{id}', 'Diterima')->name('admin.pengajuantimenotavailable.diterima');
    Route::get('/pengajuantimenotavailable/diterima/{id}', 'Ditolak')->name('admin.pengajuantimenotavailable.ditolak');
});

Route::controller(UserController::class)->group(function () {
    Route::get('users/delete/{id}', 'destroy')->name('admin.user.delete');
});


Route::controller(UserController::class)->middleware(['auth'])->group(function () {
    Route::get('/user/view/{id}', 'UserView')->name('user.view');
    Route::get('/user/edit/{id}', 'UserEdit')->name('user.edit');
    Route::post('/user/update', 'UserUpdate')->name('user.update');
    Route::get('users/delete/{id}', 'destroy')->name('admin.user.delete');
    Route::post('/user/reset', 'UserReset')->name('user.reset');
    Route::get('/user/tidak/aktif{id}', 'UserTidakAktif')->name('user.tidak.aktif');
    Route::get('/user/aktif{id}', 'UserAktif')->name('user.aktif');
});

Route::controller(RoomsController::class)->group(function () {
    Route::get('rooms/delete/{id}', 'destroy')->name('admin.room.delete');
});


Route::controller(AuthController::class)->middleware(['auth'])->group(function () {
    Route::get('logout', 'logout')->name('admin.logout');
});

Route::controller(AdminController::class)->middleware(['auth'])->group(function () {

    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});
