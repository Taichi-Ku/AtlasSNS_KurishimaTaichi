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
        $posts = Post::
        whereIn('user_id', $followingIds)
            ->with('user')                  // userテーブルを事前に読み込む。N＋1問題解消
            ->select('posts.*')             // postsテーブルのカラムだけを選択。(曖昧なidを防ぐ)
            ->orderBy('created_at', 'desc') // 新しい順番
            ->get();
        // dd($posts);

        return view('posts.index', compact('user', 'followCount', 'followerCount', 'posts'));
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'post' => ['required', 'min:1', 'max:150'],
        ], [
            'post.required' => '入力は必須です。',
            'post.min' => '投稿は1文字以上で入力してください。',
            'post.max' => '投稿は150文字以内で入力してください。',
        ]);

        $user_id = $request->input('user_id');
        $post = $request->input('post');

        Post::create([
            'user_id' => $user_id,
            'post' => $post,
        ]);

        return redirect('/top');
    }

    public function postUpdate(Request $request)
    {
        $post_id = $request->input('post-id');
        $up_post = $request->input('up-post');

        Post::where('id', $post_id)->update([
            'post' => $up_post
        ]);
        return redirect('/top');
    }

    public function postDelete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
