<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

Route::view('/search', 'posts.search');

//Home
Route::get('/', [PostsController::class, 'homepage']);
//Create post
Route::get('/p/create', [PostsController::class, 'create']);

//Show post
Route::get('/p/{post}', [PostsController::class, 'show']);

//Store post
Route::post('/p', [PostsController::class, 'store']);

//
Route::get('/profile/{user}', [HomeController::class, 'index'])->name('profile.show');
//Show profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
//Edit profile
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/explore', [ExploreController::class, 'index'])->name('friends.explore');

Route::get('/addfriend/{user}', [FriendController::class, 'add']);

Route::get('/accept/{user}', [FriendController::class, 'accept']);

Route::get('/reject/{user}', [FriendController::class, 'reject']);

Route::get('/unfriend/{user}', [FriendController::class, 'unfriend']);
// Route::get('/addfriend', function(){
//     $user1 = User::find(1);
//     $user2 = User::find(2);

//     $user1->befriend($user2);
//     $getFriend = $user1->getAllFriendships();
//     $user2->acceptFriendRequest($user1);

//     dd($getFriend);
// });