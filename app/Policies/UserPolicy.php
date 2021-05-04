<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): Response
    {
        return ($user->isAdmin() || $user->isCurrentUser())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): Response
    {
        return ($user->isAdmin())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }
}
