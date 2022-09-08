<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Routes
Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('/request-appointment', [App\Http\Controllers\UserController::class, 'showAppointmentForm'])->name('user.requestAppointment');

Route::get('/appointment-requests', [App\Http\Controllers\UserController::class, 'appointmentRequests'])->name('user.appointmentRequests');

Route::get('/settings', [App\Http\Controllers\UserController::class, 'settings'])->name('user.settings');

Route::post('/update-profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.updateProfile');

Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('user.password');

Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.updatePassword');


//Admin Routes

Route::group([
    'middleware' => ['admin'],
    'prefix' => 'admin'

], function ($router) {
    
        Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('admin.settings');

        Route::post('/update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('admin.updateProfile');

        Route::get('/settings/password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('admin.password');

        Route::post('/update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('admin.updatePassword');

        Route::get('/registered-users', [App\Http\Controllers\HomeController::class, 'registeredUsers'])->name('admin.users');

        Route::get('/delete-user/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('admin.deleteUser');

        Route::get('/settings/calendar', [App\Http\Controllers\HomeController::class, 'calendarSettings'])->name('admin.calendarSettings');

        Route::post('/activate-day', [App\Http\Controllers\HomeController::class, 'activateCalendarDay'])->name('admin.activateCalendarDay');

        Route::post('/update-start-time', [App\Http\Controllers\HomeController::class, 'updateStartTime'])->name('admin.updateStartTime');

        Route::post('/update-stop-time', [App\Http\Controllers\HomeController::class, 'updateStopTime'])->name('admin.updateStopTime');
    });