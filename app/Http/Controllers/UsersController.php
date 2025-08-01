<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function search(Request $request){
        $user = User::with('followings', 'followers')->find(Auth::id());
        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        $keyword = $request->input('keyword');

        $users = User::with('followers', 'followings')
            ->where('id', '<>', Auth::id()) // 自分以外
            ->when($keyword, function($query, $keyword) {
                return $query->where('username', 'like', "%{$keyword}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('users.search', compact('user', 'followCount', 'followerCount', 'users', 'keyword'));
    }
}
