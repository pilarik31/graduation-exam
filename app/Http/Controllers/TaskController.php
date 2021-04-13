<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'string|nullable',
            'from' => 'date|nullable',
            'to' => 'date|nullable',
        ], [
            'title.required' => 'Task name is required!'
        ]);

        Task::create($validatedData);
        return redirect()->route('tasks.index')->with('success', "Task  $request->title created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('tasks.show', [
            'task' => Task::findOrFail($task->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => Task::findOrFail($task->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'string|nullable',
            'from' => 'date|nullable',
            'to' => 'date|nullable',
        ], [
            'title.required' => 'Task name is required!'
        ]);
        $task->update($validatedData);
        return redirect()->route('tasks.index')->with('success', "Task $task->title edited.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        Task::destroy($task->id);
        return redirect()->route('tasks.index');
    }
}
