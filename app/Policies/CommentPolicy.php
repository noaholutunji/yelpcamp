<?php

namespace App\Policies;

use App\User;
use App\Campground;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Comment $comment)
    {
        return $comment->owner_id == $user->id;
    }
}
