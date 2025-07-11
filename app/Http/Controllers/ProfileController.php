<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function otherProfile(User $user)
    {
        $loginUser=Auth::user()->load('followings', 'followers');
        $followCount = $loginUser->followings()->count();
        $followerCount = $loginUser->followers()->count();

        $posts = Post::whereIn('user_id', $user)
            ->with('user')
            ->select('posts.*')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profiles.otherProfile', compact('user', 'loginUser', 'followCount', 'followerCount', 'posts'));
    }
}
