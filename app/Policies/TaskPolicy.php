<?php

namespace App\Policies;

use App\Models\Client;
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
    public function view(Client $client, Task $task): Response
    {
        if ($client->isAdmin() || $client->isImplementer()) {
            return Response::allow();
        }
        if ($client->id === $task->client->id) {
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
    public function update(Client $client): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Client $client): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    public function complete(Client $client): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
        //return Response::allow();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Client $client, Task $task): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Client $client, Task $task): void
    {
        //
    }
}
