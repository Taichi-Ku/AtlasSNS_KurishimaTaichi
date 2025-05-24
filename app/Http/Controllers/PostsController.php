<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        return view('posts.index', compact('user', 'followCount', 'followerCount'));
    }
}
