<?php

namespace App\Policies;

use App\Models\User;
use App\Models\idea;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{

    public function update(User $user, idea $idea): bool

    {
        return ((bool) $user->is_admin||$user->is($idea->user) );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, idea $idea): bool
    {
    return ((bool) $user->is_admin || $user->is($idea->user));

    }



}
