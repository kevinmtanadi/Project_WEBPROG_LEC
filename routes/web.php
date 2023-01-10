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
// ---------------------------------------------------------------- ADMIN ONLY PAGE -----------------------------------------------------
Route::get('/adminPage', [UserController::class, 'adminPage'])->middleware('admin');

// ---------------------------------------------------------------- POST ----------------------------------------------------------------
Route::get('/likePost/{post_id}', [PostController::class, 'likePost'])->middleware('logged.in');
Route::get('/unlikePost/{post_id}', [PostController::class, 'unlikePost'])->middleware('logged.in');;
Route::post('/createpost', [PostController::class, 'createPost'])->middleware('logged.in');;
Route::get('/deletePost/{post_id}', [PostController::class, 'deletePost'])->middleware('admin');

// ---------------------------------------------------------------- COMMENT ----------------------------------------------------------------
Route::post('/addComment/{post_id}', [CommentController::class, 'addComment'])->middleware('logged.in');;
Route::get('/likeComment/{comment_id}', [CommentController::class, 'likeComment'])->middleware('logged.in');;
Route::get('/unlikeComment/{comment_id}', [CommentController::class, 'unlikeComment'])->middleware('logged.in');;
Route::get('/deleteComment/{comment_id}', [CommentController::class, 'deleteComment'])->middleware('admin');;

// ---------------------------------------------------------------- USER ----------------------------------------------------------------
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/updateProfile', [UserController::class, 'updateProfilePage'])->middleware('logged.in');;
Route::post('/changeprofilepic', [UserController::class, 'changeProfilePic'])->middleware('logged.in');;
Route::post('/executeUpdateProfile', [UserController::class, 'updateProfile'])->middleware('logged.in');;

// ---------------------------------------------------------------- FRIEND ----------------------------------------------------------------
Route::get('/searchPeople', [FriendController::class, 'searchPeople'])->middleware('logged.in');;
Route::get('/addFriend/{friend_id}', [FriendController::class, 'sendFriendRequest'])->middleware('logged.in');;
Route::get('/removeFriend/{friend_id}', [FriendController::class, 'removeFriend'])->middleware('logged.in');;
Route::get('/cancelFriendRequest/{friend_id}', [FriendController::class, 'cancelFriendRequest'])->middleware('logged.in');;
Route::get('/friend', [FriendController::class, 'showFriend'])->middleware('logged.in');;
Route::get('/profile/{id}', [FriendController::class, 'showProfile'])->middleware('logged.in');;

// ---------------------------------------------------------------- HOMEPAGE ----------------------------------------------------------------
Route::get('/', [UserController::class, 'homepage']);


// UNCOMMENT AND RUN THIS ROUTE TO ADD ADMIN ------------------------------------------------------------------------------------------------
// use App\Models\User;
// use Carbon\Carbon;
// Route::get('/addAdmin', function() {
//     User::insert([
//         'name' => 'admin',
//         'email' => 'admin@example.com',
//         'password' => bcrypt('admin'),
//         'phone' => 'none',
//         'gender' => 'male',
//         'dob' => Carbon::now(),
//         'profile_pic' => 'profile.jpg',
//         'role' => 'admin',
//         'created_at' => Carbon::now(),
//     ]);
// });