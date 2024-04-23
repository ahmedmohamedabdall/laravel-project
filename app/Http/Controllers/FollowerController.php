<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();
        $follower->following()->attach($user);
        return redirect()->route('user.show', $user->id)->with('success', 'user followed successfully');
    }

    public function unfollow(User $user){
        $follwer = auth()->user();
        $follwer->following()->detach($user);
        return redirect()->route('user.show', $user->id)->with('success', 'user unfollowed successfully');

    }
}
