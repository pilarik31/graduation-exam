<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function viewAny(Client $client)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function view(Client $client, Task $task)
    {
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function create(Client $client)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function update(Client $client, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function delete(Client $client, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function restore(Client $client, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Client  $client
     * @param  \App\Models\Task  $task
     * @return mixed
     */
    public function forceDelete(Client $client, Task $task)
    {
        //
    }
}
