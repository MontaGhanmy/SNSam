<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitationPolicy
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
    public function viewAny($user)
    {
        return $user->can('manageInvitation');
    }

    public function view($user, $post)
    {
        return $user->can('manageInvitation');
    }

    public function create($user)
    {
        return $user->can('manageInvitation');
    }

    public function update($user, $post)
    {
        return $user->can('manageInvitation', $post);
    }

    public function delete($user, $post)
    {
        return $user->can('manageInvitation', $post);
    }

    public function restore($user, $post)
    {
        return $user->can('manageInvitation', $post);
    }

    public function forceDelete($user, $post)
    {
        return $user->can('manageInvitation', $post);
    }
}
