<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class FollowsController extends Controller
{
    private function getUserSidebarData()
    {
        $user = Auth::user()->load(['followings', 'followers']);

        return [
            'user' => $user,
            'followCount' => $user->followings->count(),
            'followerCount' => $user->followers->count(),
        ];
    }

    // フォロー/フォロワーリストページの表示
    public function followList()
    {
        $sidebar = $this->getUserSidebarData();

        $followingIds = $sidebar['user']->followings->pluck('id')->toArray();

        $posts = Post::whereIn('user_id', $followingIds)
            ->with('user')
            ->select('posts.*')
            ->orderBy('created_at', 'desc')
            ->get();

        $followings = $sidebar['user']->followings;

        return view('follows.followList', array_merge($sidebar, [
            'posts' => $posts,
            'followings' => $followings,
        ]));
    }
    public function followerList()
    {
        $sidebar = $this->getUserSidebarData();

        $followerIds = $sidebar['user']->followers->pluck('id')->toArray();

        $posts = Post::whereIn('user_id', $followerIds)
            ->with('user')
            ->select('posts.*')
            ->orderBy('created_at', 'desc')
            ->get();

        $followers = $sidebar['user']->followers;

        return view('follows.followerList', array_merge($sidebar, [
            'posts' => $posts,
            'followers' => $followers,
        ]));
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
