<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Post $bb): bool
    {
        return $bb->user->id === $user->id;
    }
    public function destroy(User $user, Post $bb): bool
    {
        return $this->update($user, $bb);
    }
}
