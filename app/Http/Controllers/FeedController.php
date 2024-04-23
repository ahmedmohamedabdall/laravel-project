<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

$FollowingId=auth()->user()->following()->pluck('user_id');
        $idea = idea::whereIn('user_id',$FollowingId)->latest();

if(request()->has('search')){
            $idea = $idea->Search('search','');
}

        return view('DashBoard', ['ideas' => $idea->paginate(3)]);

    }
}
