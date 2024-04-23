<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store (StoreIdeaRequest $request){

        $validated =$request->validated();
        $validated['user_id'] = auth()->id();
        idea::create($validated);
        return redirect()->route('dashboard',)->with('success', 'idea created successfully!');
    }



    public function destroy(idea $idea){
        $this->authorize('delete', $idea);
        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'idea deleted !');


    }
public function show(idea $idea){
        return view('ideas.show',compact('idea') );
}

public function edit(idea $idea){
        $this->authorize('update', $idea);
        $editing = true;
        return view('ideas.show',compact('idea','editing') );
}

    public function update (idea $idea,UpdateIdeaRequest $request){
        $this->authorize('update', $idea);


        $validated =$request->validated();
        $idea->update($validated);
        return redirect()->route('ideas.show',$idea->id)->with('success', 'idea updated!');
    }


}
