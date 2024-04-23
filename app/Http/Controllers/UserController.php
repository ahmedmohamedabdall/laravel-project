<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\facades\Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */

    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        //$editing = true;

        $ideas = $user->ideas()->paginate(5);

        return view('users.edit', compact('user', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateUserRequest $request,User $user)
    {
        $this->authorize('update',$user);

        $validated =$request->validated();

        if ($request->has('image')) {
            $imagpath = $request
                ->file('image')
                ->store('profile', 'public');
            $validated['image'] = $imagpath;
            Storage::disk('public')-> delete($user->image??'');
        }

        $user->update($validated);

        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    } /**
     * Remove the specified resource from storage.
     */
}
