<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::put('/password{user}', [PasswordController::class, 'update'])->name('password.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('throttle:3');
Route::get('logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::get('admin', [AdminController::class, 'index'])->middleware('auth');
