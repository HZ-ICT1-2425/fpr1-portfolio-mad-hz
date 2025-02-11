<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/profile', ProfileController::class)->name('profile');

Route::get('/contact', ContactController::class)->name('contact');

Route::get('/auth/login', LoginController::class)->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.login');

Route::post('/auth/logout', LogoutController::class)->name('auth.logout');

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::resources([
    'posts' => PostController::class,
    'faqs' => FaqController::class,
]);
