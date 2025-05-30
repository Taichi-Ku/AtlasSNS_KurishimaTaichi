<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(){
        $user = Auth::user();

        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        $followingIds = $user
            ->followings()      // フォロー中のテーブル
            ->pluck('users.id') // ユーザーIDを選択
            ->toArray();        // 配列に変換
        $followingIds[] = $user->id; // 自分のIDも追加！
        $posts = Post::whereIn('user_id', $followingIds)
            ->with('user')                  // userテーブルを事前に読み込む。N＋1問題解消
            ->select('posts.*')             // postsテーブルのカラムだけを選択。(曖昧なidを防ぐ)
            ->orderBy('created_at', 'desc') // 新しい順番
            ->get();

        return view('posts.index', compact('user', 'followCount', 'followerCount', 'posts'));
    }
}
