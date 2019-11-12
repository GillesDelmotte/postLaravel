<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Commentpolicy
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

    public function forceDelete(User $user, Comment $comment)
    {
        return  $user->is_admin == 1 || $user->id == $comment->user_id;
    }
}
