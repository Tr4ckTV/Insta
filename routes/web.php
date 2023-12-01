<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/avatar', [ProfileController::class, 'showAvatarForm'])->name('profile.avatar');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    Route::get('/search', [SearchController::class, 'index'])->name('search');

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/profile/{user}/follow', [ProfileController::class, 'follow'])->name('follow');
    Route::post('/profile/{user}/unfollow', [ProfileController::class, 'unfollow'])->name('unfollow');

    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

    Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comment.create');

    Route::get('/admin', [AdminPostController::class, 'index'])->name('admin');
    Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts/store', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/confirm-delete/{post}', [AdminPostController::class, 'confirmDelete'])->name('admin.posts.confirm-delete');
    Route::delete('/admin/posts/delete/{post}', [AdminPostController::class, 'delete'])->name('admin.posts.delete');
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
});

require __DIR__.'/auth.php';
