<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\UserController;
use \App\Http\Controllers\Backend\TaskController;
use  \Illuminate\Auth\Access\Gate;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [TaskController::class, 'index'])->name('home');
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('users', UserController::class);
});
Route::resource('tasks', TaskController::class);
