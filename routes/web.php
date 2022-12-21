<?php

use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/about', function () {
    return view('about');
});

Route::get('/posts', function () {
    return view('posts');
})->middleware('auth');

Route::get('/dashboard', function () {
    $posts = Post::all();
    return view('dashboard', [
        'posts' => $posts,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // add a post
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts', [PostController::class, 'post'])->name('posts');
    Route::get('/edit-post/{id}', [PostController::class, 'edit'])->name('edit-post');
    Route::post('/update-post/{id}', [PostController::class, 'update'])->name('update-post');
    Route::post('/delete-post/{id}', [PostController::class, 'delete'])->name('delete-post');
    Route::post('/add-post', [PostController::class, 'add'])->name('add-post');
});

require __DIR__.'/auth.php';
