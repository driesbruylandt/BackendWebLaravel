<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqCategoryController;

Route::get('/', [PostsController::class, 'showPosts'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin.access'])->group(function () {
    // Post routes
    Route::resource('posts', PostsController::class)->except(['index', 'show']);
    Route::post('/posts/{post}/upvote', [PostsController::class, 'upvote'])->name('posts.upvote');
    Route::post('/posts/{post}/downvote', [PostsController::class, 'downvote'])->name('posts.downvote');

    // Promote user routes
    Route::get('/admin/promote/form', [AdminController::class, 'showPromoteForm'])
        ->name('admin.promote.form');
    Route::post('/admin/promote', [AdminController::class, 'promoteUser'])
        ->name('admin.promote');

    // FAQ routes
    Route::resource('faq', FaqController::class)->except(['index']);
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::resource('faqCategories', FaqCategoryController::class);
    
    // Contact routes
    Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
    Route::post('/contact', [ContactController::class, 'submitContactForm']);
    Route::post('/contact/{id}/reply', [ContactController::class, 'sendReply'])->name('contact.reply');
});


Route::view('/about', 'about')->name('about.show');

require __DIR__.'/auth.php';
