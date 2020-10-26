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

Route::get('/profile', function () {
    return view('profile');
});


Auth::routes();

Route::get('/profile/{userId}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('id.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts');
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store'])->name('post');
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show');


Route::get('/profile/{username}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile.show');
Route::get('/profile/{username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{username}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
//Search

Route::get('/search' , [App\Http\Controllers\ProfileController::class, 'search'])->name('search');
