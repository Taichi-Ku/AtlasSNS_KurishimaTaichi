<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowsController extends Controller
{
    public function followList(){
        return view('follows.followList');
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
