<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts');
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store'])->name('post');
Route::delete('/post/{post}/destroy', [App\Http\Controllers\PostsController::class, 'postDestroy'])->name('postDestroy');
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('post.show');
Route::post('/post/{post}/likes', [App\Http\Controllers\LikeController::class, 'postLikeStore'])->name('post.like');
Route::delete('/post/{post}/likes', [App\Http\Controllers\LikeController::class, 'postLikeDestroy'])->name('post.like.delete');

Route::get('/commentsDisplay', [App\Http\Controllers\CommentController::class, 'commentsDisplay'])->name('commentsDisplay');
Route::post('/comments/create/post', [App\Http\Controllers\CommentController::class, 'commentsPostStore'])->name('comments.postStore');
Route::post('/comments/create/music', [App\Http\Controllers\CommentController::class, 'commentsMusicStore'])->name('comments.musicStore');
Route::delete('/comments/{comment}/post/destroy', [App\Http\Controllers\CommentController::class, 'commentsPostDestroy'])->name('post.commentDestroy');
Route::delete('/comments/{comment}/music/destroy', [App\Http\Controllers\CommentController::class, 'commentsMusicDestroy'])->name('music.commentDestroy');

Route::post('/send-message', [App\Http\Controllers\MessageController::class, 'sendMessage'])->name('message.send-message');

Route::get('/music/upload', [App\Http\Controllers\MusicController::class, 'upload'])->name('upload');
Route::post('/music', [App\Http\Controllers\MusicController::class, 'store'])->name('storedupload');
Route::get('/music/{music}', [App\Http\Controllers\MusicController::class, 'show'])->name('music.show');
Route::post('/music/{music}/likes', [App\Http\Controllers\LikeController::class, 'musicLikeStore'])->name('music.like');
Route::delete('/music/{music}/likes', [App\Http\Controllers\LikeController::class, 'musicLikeDestroy'])->name('music.like.delete');
Route::delete('/music/{music}/destroy', [App\Http\Controllers\MusicController::class, 'musicDestroy'])->name('musicDestroy');

Route::get('/profile/{username}', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile.show');
Route::get('/profile/{username}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{username}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/discover' , [App\Http\Controllers\MusicController::class, 'discover'])->name('discover');
Route::get('/getRandomLikedMusicId' , [App\Http\Controllers\MusicController::class, 'getRandomLikedMusicId'])->name('getRandomLikedMusicId');

Route::get('/conversation/{userId}' , [App\Http\Controllers\MessageController::class, 'conversation'])->name('message.conversation');

//Search
Route::get('/search' , [App\Http\Controllers\ProfileController::class, 'search'])->name('search');

//OAuth
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback'])->name('facebook.callback');
