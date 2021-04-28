<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Task;
use App\Models\Tasklist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('tasks.index', [
            'tasks' => Task::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $request->session()->reflash();
        return view('tasks.create', [
            'clients' => Client::all(),
            'tasklists' => Tasklist::all(),
            'tasklistPreselect' => $request->session()->get('tasklist'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'string|nullable',
            'implementer_id' => 'integer',
            'tasklist_id' => 'integer|required',
            'from' => 'date|nullable',
            'to' => 'date|nullable',
        ], [
            'title.required' => 'Task name is required!',
            'tasklist_id' => 'Tasklist is required'
        ]);
        $validatedData += ['client_id' => Auth::id()];
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
            'implementer' => Client::findOrFail($task->implementer_id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', [
            'task' => Task::findOrFail($task->id),
            'clients' => Client::all(),
            'tasklists' => Tasklist::all(),
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
            'implementer_id' => 'integer',
            'tasklist_id' => 'integer|required',
            'from' => 'date|nullable',
            'to' => 'date|nullable',
        ], [
            'title.required' => 'Task name is required!',
            'tasklist_id.required' => 'Task ID is required!',
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

    public function complete(Task $task)
    {
        $this->authorize('complete', $task);
        if ($task->completed) {
            $task->update(['completed' => 0]);
        } else {
            $task->update(['completed' => 1]);
        }
        return redirect()->back();
    }
}
