<?php

namespace App\Http\Controllers;

use App\Models\Tasklist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TasklistController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Tasklist::class, 'tasklist');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tasklists.index', [
            'tasklists' => Tasklist::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasklists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'string|required',
        ], [
            'name.required' => 'Task name is required!',
            'description.required' => 'Task description is required!'
        ]);
        Tasklist::create($validatedData);
        return redirect()->route('tasklists.index')->with('success', "Tasklist $request->name created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasklist $tasklist): View
    {
        session()->flash('tasklist', $tasklist->id);
        return view('tasklists.show', [
            'tasklist' => $tasklist,
            'tasks' => $tasklist->tasks,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasklist $tasklist): View
    {
        return view('tasklists.edit', [
            'tasklist' => $tasklist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasklist $tasklist): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'string|nullable',
        ], [
            'name.required' => 'Task name is required!',
        ]);
        $tasklist->update($validatedData);
        return redirect()->route('tasklists.index')->with('success', "Tasklist $tasklist->name edited.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasklist $tasklist): RedirectResponse
    {
        Tasklist::destroy($tasklist->id);
        return redirect()->route('tasklists.index');
    }
}
