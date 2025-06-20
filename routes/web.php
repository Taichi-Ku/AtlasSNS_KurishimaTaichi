<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
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



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

  Route::get('top', [PostsController::class, 'index']);

  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'search']);

  Route::get('follow-list', [PostsController::class, 'index']);
  Route::get('follower-list', [PostsController::class, 'index']);

  // 投稿の登録
  Route::post('/post/create', [PostsController::class, 'postCreate']);

  // 投稿の更新
  Route::post('/post/update', [PostsController::class, 'postUpdate']);

  // 投稿の削除
  Route::get('/post/{id}/delete', [PostsController::class, 'postDelete']);

  // ユーザーの検索
  Route::post('/search', [UsersController::class, 'search']);

  // フォロー・アンフォロー機能
  Route::post('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
  Route::delete('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');

  //test あとでちゃんと消す！
  // Route::get('/post/update', function(){
  //   echo 'GET!';
  // });
  // Route::post('/search', function(){
  //   echo 'POST!';
  // });
});
