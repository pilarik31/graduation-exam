<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        return view('clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => "required",
            'email' => 'required|email|unique:clients,email',
            'password' => 'required'
        ], [
            'firstname.required' => 'Firstname is required!',
            'lastname.requried' => 'Lastname is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
        ]);
        $validatedData['password'] = Hash::make($request->password);

        Client::create($validatedData);
        return redirect('/clients/')->with('success', "Client  $request->firtname $request->lastname created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //dump(Client::find($client->id)->tasks());
        return view('clients.show', [
            'client' => Client::findOrFail($client->id),
            'tasks' => Client::findOrFail($client->id)->tasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => Client::findOrFail($client->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        if ($request->has('password')) {
            dump($request->except(['password']));
        }

        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:clients,email',
            'password' => '',
        ], [
            'firstname.required' => 'Firstname is required!',
            'lastname.requried' => 'Lastname is required!',
            'email.required' => 'Email is required!',
        ]);
        $validatedData = array_filter($validatedData);
        $client->update($validatedData);
        return redirect('/clients/')->with('success', "Client $client->firstname $client->lastname edited.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id);
        return redirect('/clients/')->with('success', "Client $client->firstname $client->lastname deleted.");
    }
}
