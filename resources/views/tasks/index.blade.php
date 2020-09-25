@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
    <h1>Welcome in the task area!</h1>

    <table class="table">
        <thead>
            <th>Task</th>
            <th>Description</th>
            <th>From</th>
            <th>Deadline</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                <td class="w-50">{{ $task->description }}</td>
                <td>{{ date('d. m. Y', strtotime($task->from)) }}</td>
                <td>{{ date('d. m. Y', strtotime($task->to)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/tasks/create" class="btn btn-info">Create new task</a>
@endsection
