<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Task;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'address' => '',
            'city' => '',
            'role_id' => 'required',
        ], [
            'firstname.required' => __('validation.required', ['attribute' => __('users.firstname')]),
            'lastname.required' => __('validation.required', ['attribute' => __('users.lastname')]),
            'email.required' => __('validation.required', ['attribute' => __('users.email')]),
            'password.required' => __('validation.required', ['attribute' => __('users.password')]),
            'phone.required' => __('validation.required', ['attribute' => __('users.phone')]),
            'birthday.required' => __('validation.required', ['attribute' => __('users.birthday')]),
            'role_id.required' => 'Role is required!'
        ]);
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);
        return redirect()->route('users.index')->with('success', "User  $request->firtname $request->lastname created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', [
            'user' => User::findOrFail($user->id),
            'tasks' => User::findOrFail($user->id)->tasks->sortBy('to')->sortBy('completed'),
            'implements' => Task::all()
                ->sortBy('to')
                ->sortBy('completed')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => User::findOrFail($user->id),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
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
            'firstname.required' => __('validation.required', ['attribute' => __('users.firstname')]),
            'lastname.requried' => __('validation.required', ['attribute' => __('users.lastname')]),
            'email.required' => __('validation.required', ['attribute' => __('users.email')]),
            'phone.required' => __('validation.required', ['attribute' => __('users.phone')]),
            'birthday.required' => __('validation.required', ['attribute' => __('users.birthday')]),
            'role_id' => 'required',
        ]);
        $validatedData = array_filter($validatedData);
        if (!is_array($validatedData)) {
            throw new Exception('Something is broken.');
        }
        if (array_key_exists('password', $validatedData)) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user->update($validatedData);
        return redirect()
            ->route('users.index')
            ->with('success', "User $user->firstname $user->lastname edited.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        User::destroy($user->id);
        return redirect()
            ->route('users.index')
            ->with('success', "User $user->firstname $user->lastname deleted.");
    }
}
