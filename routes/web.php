<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeReactController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\SearchController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::post('follow/{user}', [FollowsController::class, 'store']);

//Home
Route::get('/', [PostsController::class, 'homepage']);
//Create post
Route::get('/p/create', [PostsController::class, 'create']);
//Show post
Route::get('/p/{post}', [PostsController::class, 'show']);
//Store post
Route::post('/p', [PostsController::class, 'store']);
// //Redirect after login
// Route::get('/', [HomeController::class, 'index'])->name('profile.show');
//Show profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
//Edit profile
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');


Route::get('/explore', [ExploreController::class, 'index'])->name('friends.explore');

//Friends
Route::get('/addfriend/{user}', [FriendController::class, 'add']);
Route::get('/cancel/{user}', [FriendController::class, 'cancel']);
Route::get('/accept/{user}', [FriendController::class, 'accept']);
Route::get('/decline/{user}', [FriendController::class, 'decline']);
Route::get('/unfriend/{user}', [FriendController::class, 'unfriend']);

//Comments
Route::post('/comment', [CommentsController::class, 'saveComm']);
Route::delete('/comment/delete/{comment}', [CommentsController::class, 'deleteComm']);

Route::get('/comment/{comment}/edit', [CommentsController::class, 'editComm'])->name('posts.editcomm');
Route::patch('/comment/edit/{comment}', [CommentsController::class, 'updateComm']);

//Like
Route::get('/like/{post}', [LikeReactController::class, 'likePost']);

//Search
Route::get('/search', [SearchController::class, 'search']);

//chat
Route::get('/chat', [ChatsController::class, 'index'])->name('chat.index');
Route::get('/chat/{user}/create', [ChatsController::class, 'createChat']);
Route::get('/chat/load/{conversation}', [ChatsController::class, 'loadChat'])->name('chat.show');
Route::post('/chat/{conversation}/send', [ChatsController::class, 'sendMessage']);
