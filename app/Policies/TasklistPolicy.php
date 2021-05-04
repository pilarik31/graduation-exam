<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tasklist;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TasklistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tasklist $tasklist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tasklist $tasklist): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tasklist $tasklist): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tasklist $tasklist): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tasklist $tasklist): void
    {
        //
    }
}
