<?php

namespace App\Policies;

use App\User;
use App\Campground;

use Illuminate\Auth\Access\HandlesAuthorization;

class CampgroundPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Campground $campground)
    {
        return $campground->owner_id ==$user->id;
    }
}
