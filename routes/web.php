<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;

# Home main route
Route::get('/', [HomeController::class, 'index'])->name('home');

# Login User
Route::get('/login', [UserController::class, 'getLogin'])->name('login');
Route::post('/login', [UserController::class, 'postLogin'])->name('login');

# Register User
Route::get('/register', [UserController::class, 'getRegister'])->name('register');
Route::post('/register', [UserController::class, 'postRegister'])->name('register');

# Logout User
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

# Auth Routes
Route::middleware('auth')->group(function() {
  # An specific user files with auth && owner accessability
  Route::resource('{username}/file', FileController::class)->except('index','show');
});

# An specific user files with public accessability
Route::resource('{username}/file', FileController::class)->only('index','show');
// 
# Search Files or Users route
Route::get('/search', [SearchController::class, 'getSearch'])->name('search');