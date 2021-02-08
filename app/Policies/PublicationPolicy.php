<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Publication;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicationPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Publication $publication)
    {
        return $publication->user->is($user);
    }

    public function edit(User $user, Publication $publication)
    {
        return $publication->user->is($user);
    }

    public function delete(User $user, Publication $publication)
    {
        return $publication->user->is($user);
    }
}
