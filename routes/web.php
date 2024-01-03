<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [PostsController::class, 'showPosts'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

Route::post('/posts/{post}/upvote', [PostsController::class, 'upvote'])->name('posts.upvote');
Route::post('/posts/{post}/downvote', [PostsController::class, 'downvote'])->name('posts.downvote');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/promote/form', [AdminController::class, 'showPromoteForm'])
        ->name('admin.promote.form');
    Route::post('/admin/promote', [AdminController::class, 'promoteUser'])
        ->name('admin.promote');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts/{post}/edit', [PostsController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{post}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // ...

    // Apply the admin.access middleware to restrict access to admins only
    Route::middleware('admin.access')->group(function () {
        Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    });

    // ...
});


Route::middleware(['auth', 'verified', 'admin.access'])->group(function () {
    Route::resource('faq', FaqController::class);
});

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitContactForm']);

Route::middleware(['auth', 'admin.access'])->post('/contact/{id}/reply', [ContactController::class, 'sendReply'])->name('contact.reply');

Route::view('/about', 'about')->name('about.show');
require __DIR__.'/auth.php';
