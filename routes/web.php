<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/profile', ProfileController::class)->name('profile');

Route::get('/faqs', FaqController::class)->name('faqs.index');

Route::get('/contact', ContactController::class)->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', LoginController::class)->name('auth.login');
    Route::post('/auth/login', [LoginController::class, 'store'])->name('auth.login');
});

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/show/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post:slug}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post:slug}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');

    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');

    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    Route::post('/auth/logout', LogoutController::class)->name('auth.logout');
});
