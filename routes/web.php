<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// ---------------------------------------------------------------- POST ----------------------------------------------------------------
Route::get('/likePost/{post_id}', [PostController::class, 'likePost']);
Route::get('/unlikePost/{post_id}', [PostController::class, 'unlikePost']);
Route::post('/createpost', [PostController::class, 'createPost']);

// ---------------------------------------------------------------- COMMENT ----------------------------------------------------------------
Route::post('/addComment/{post_id}', [CommentController::class, 'addComment']);
Route::get('/likeComment/{comment_id}', [CommentController::class, 'likeComment']);
Route::get('/unlikeComment/{comment_id}', [CommentController::class, 'unlikeComment']);

// ---------------------------------------------------------------- USER ----------------------------------------------------------------
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// ---------------------------------------------------------------- FRIEND ----------------------------------------------------------------
Route::get('/searchPeople', [FriendController::class, 'searchPeople']);
Route::get('/addFriend/{friend_id}', [FriendController::class, 'sendFriendRequest']);
Route::get('/removeFriend/{friend_id}', [FriendController::class, 'removeFriend']);
Route::get('/cancelFriendRequest/{friend_id}', [FriendController::class, 'cancelFriendRequest']);
Route::get('/friend', [FriendController::class, 'showFriend']);
Route::get('/profile/{id}', [FriendController::class, 'showProfile']);

// ---------------------------------------------------------------- HOMEPAGE ----------------------------------------------------------------
Route::get('/', [UserController::class, 'homepage']);