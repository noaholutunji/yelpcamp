<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampgroundPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Campground $campground)
    {
        return $user->is($campground->owner);
    }
}
