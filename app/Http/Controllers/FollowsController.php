<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followList(){
        $user = Auth::user();

        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        $followingIds = $user
            ->followings()      // フォロー中のテーブル
            ->pluck('users.id') // ユーザーIDを選択
            ->toArray();        // 配列に変換
        $posts = Post::whereIn('user_id', $followingIds)
            ->with('user')                  // userテーブルを事前に読み込む。N＋1問題解消
            ->select('posts.*')             // postsテーブルのカラムだけを選択。(曖昧なidを防ぐ)
            ->orderBy('created_at', 'desc') // 新しい順番
            ->get();

        return view('follows.followList', compact('user', 'followCount', 'followerCount', 'posts'));
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // フォロー・アンフォロー機能
    public function follow(User $user)
    {
        // Auth::user()->followings()->attach($user->id);
        Auth::user()->followings()->syncWithoutDetaching([$user->id]);
        return redirect('/search');
    }
    public function unfollow(User $user)
    {
        Auth::user()->followings()->detach($user->id);
        return redirect('/search');
    }
}
