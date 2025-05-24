<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function search(){
        $user = Auth::user();
        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        return view('users.search', compact('user', 'followCount', 'followerCount'));
    }
}
