<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentIdeaRequest;
use App\Models\comment;

use App\Models\idea;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentIdeaRequest $request ,idea $idea){
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        $validated["idea_id"] = $idea->id ;

        comment::create($validated);

        return redirect()->route('dashboard',$idea->id)->with('success', 'comment posted!');

    }
}
