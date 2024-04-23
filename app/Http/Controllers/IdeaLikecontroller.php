<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class IdeaLikecontroller extends Controller
{
    public function like(idea $idea){
        $liker = auth()->user();
        $liker->likes()->attach($idea);
        return redirect()->route('dashboard', $idea->id)->with('success', 'liked successfully');

    }


    public function unlike(idea $idea){
        $liker = auth()->user();
$liker->likes()->detach($idea);
return redirect()->route('dashboard', $idea->id)->with('success', 'unliked successfully');


    }
}
