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
  // トップ
  Route::get('top', [PostsController::class, 'index'])->name('post.index');

  Route::prefix('post')->name('post.')->group(function () {
    // 投稿の登録
    Route::post('/create', [PostsController::class, 'postCreate'])->name('create');
    // 投稿の更新
    Route::post('/update', [PostsController::class, 'postUpdate'])->name('update');
    // 投稿の削除
    Route::get('/{id}/delete', [PostsController::class, 'postDelete'])->name('delete');
  });

  // ユーザーの検索(上は検索フォームへ、下は検索機能)
  Route::get('search', [UsersController::class, 'search'])->name('user.search.form');
  Route::post('/search', [UsersController::class, 'search'])->name('user.search');

  // フォロー・アンフォロー機能
  Route::post('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
  Route::delete('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');

  // フォロー/フォロワーリストの表示
  Route::get('follow-list', [FollowsController::class, 'followList'])->name('follow.list');
  Route::get('follower-list', [FollowsController::class, 'followerList'])->name('follower.list');

  // プロフィール表示
  Route::get('profile', [ProfileController::class, 'profile'])->name('profile.show');
  Route::get('/users/{user}', [UsersController::class, 'show'])->name('user.show');

  //test あとでちゃんと消す！
  // Route::get('/post/update', function(){
  //   echo 'GET!';
  // });
  // Route::post('/search', function(){
  //   echo 'POST!';
  // });
});
