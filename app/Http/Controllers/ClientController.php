<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clients = DB::table('clients')->get();
        return view('clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clients.create');
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
            'address' => '',
            'city' => '',
            'role_id' => 'required',
        ], [
            'firstname.required' => 'Firstname is required!',
            'lastname.requried' => 'Lastname is required!',
            'email.required' => __('validation.email.empty'),
            'password.required' => __('validation.password.empty'),
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
            'tasks' => Client::findOrFail($client->id)->tasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', [
            'client' => Client::findOrFail($client->id),
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
            'address' => '',
            'city' => '',
            'role_id' => 'required',
        ], [
            'firstname.required' => 'Firstname is required!',
            'lastname.requried' => 'Lastname is required!',
            'email.required' => __('validation.email'),
            'role_id' => 'required',
        ]);
        $validatedData = array_filter($validatedData);
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
