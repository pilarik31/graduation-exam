<?php

namespace App\Policies;

use App\Models\Client;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Client $client): Response
    {
        if ($client->isAdmin()) {
            return Response::allow();
        }
        return Response::deny();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Client $client): Response
    {
        if ($client->isAdmin()) {
            return Response::allow();
        }
        return Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Client $client): Response
    {
        if ($client->isAdmin()) {
            return Response::allow();
        }
        return Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Client $client): Response
    {
        if ($client->isAdmin()) {
            return Response::allow();
        }
        return Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Client $client): Response
    {
        if ($client->isAdmin()) {
            return Response::allow();
        }
        return Response::deny(trans('response.403'), 403);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Client $client): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Client $client): void
    {
        //
    }
}
