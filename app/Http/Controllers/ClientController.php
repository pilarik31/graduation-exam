<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Role;
use App\Models\Task;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Client::class, 'client');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('clients.index', [
            'clients' => Client::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clients.create', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => "required",
            'email' => 'required|email|unique:clients,email',
            'password' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'address' => '',
            'city' => '',
            'role_id' => 'required',
        ], [
            'firstname.required' => __('validation.required', ['attribute' => __('clients.firstname')]),
            'lastname.required' => __('validation.required', ['attribute' => __('clients.lastname')]),
            'email.required' => __('validation.required', ['attribute' => __('clients.email')]),
            'password.required' => __('validation.required', ['attribute' => __('clients.password')]),
            'phone.required' => __('validation.required', ['attribute' => __('clients.phone')]),
            'birthday.required' => __('validation.required', ['attribute' => __('clients.birthday')]),
            'role_id.required' => 'Role is required!'
        ]);
        $validatedData['password'] = Hash::make($request->password);

        Client::create($validatedData);
        return redirect()->route('clients.index')->with('success', "Client  $request->firtname $request->lastname created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): View
    {
        return view('clients.show', [
            'client' => Client::findOrFail($client->id),
            'tasks' => Client::findOrFail($client->id)->tasks->sortBy('to')->sortBy('completed'),
            'implements' => Task::all()
                ->where('implementer_id', '=', $client->id)
                ->sortBy('to')
                ->sortBy('completed'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', [
            'client' => Client::findOrFail($client->id),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client): RedirectResponse
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => '',
            'phone' => 'required',
            'birthday' => 'required',
            'address' => '',
            'city' => '',
            'role_id' => 'required',
        ], [
            'firstname.required' => __('validation.required', ['attribute' => __('clients.firstname')]),
            'lastname.requried' => __('validation.required', ['attribute' => __('clients.lastname')]),
            'email.required' => __('validation.required', ['attribute' => __('clients.email')]),
            'phone.required' => __('validation.required', ['attribute' => __('clients.phone')]),
            'birthday.required' => __('validation.required', ['attribute' => __('clients.birthday')]),
            'role_id' => 'required',
        ]);
        $validatedData = array_filter($validatedData);
        if (!is_array($validatedData)) {
            throw new Exception('Something is broken.');
        }
        if (array_key_exists('password', $validatedData)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $client->update($validatedData);
        return redirect()
            ->route('clients.index')
            ->with('success', "Client $client->firstname $client->lastname edited.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        Client::destroy($client->id);
        return redirect()
            ->route('clients.index')
            ->with('success', "Client $client->firstname $client->lastname deleted.");
    }
}
