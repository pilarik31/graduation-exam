<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\Tasklist;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TasklistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Client $client): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Client $client, Tasklist $tasklist): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Client $client): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Client $client, Tasklist $tasklist): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Client $client, Tasklist $tasklist): Response
    {
        return ($client->isAdmin() || $client->isImplementer())
            ? Response::allow()
            : Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Client $client, Tasklist $tasklist): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Client $client, Tasklist $tasklist): void
    {
        //
    }
}
