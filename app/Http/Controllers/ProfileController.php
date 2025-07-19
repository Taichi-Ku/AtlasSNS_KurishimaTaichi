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
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::user();
        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        return view('profiles.profile', compact('user', 'followCount', 'followerCount'));
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

    public function profileUpdate(Request $request)
    {
        $varidated = $request->validate([
            'username' => 'required | min:2 | max:12',
            'email' => 'required | min:5 | max:40 | email | unique:users,email,' . Auth::id(),
            'password' => 'required | min:8 | max:20 | alpha_num |confirmed',
            'bio' => 'nullable | max:500',
            'icon_image' => 'nullable | image',
        ]);

        $user = Auth::user();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->bio = $request->input('bio');
        if($request->hasFile('icon_image')){
            $filename = $request->file('icon_image')->store('icons', 'public');
            $user->icon_image = $filename;
        }

        $user->save();

        return redirect('/top');
    }
}
