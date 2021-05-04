<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): Response
    {
        if ($user->isAdmin() || $user->isImplementer()) {
            return Response::allow();
        }
        if ($user->id === $task->user->id) {
            return Response::allow();
        }
        return Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    public function complete(User $user): Response
    {
        return ($user->isAdmin() || $user->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
        //return Response::allow();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Task $task): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task): void
    {
        //
    }
}
