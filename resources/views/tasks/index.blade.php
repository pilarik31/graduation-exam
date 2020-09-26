@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
    <h1>Welcome in the task area!</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
    @endif
    
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
                <td>
                @isset($task->from)
                    {{ date('d. m. Y', strtotime($task->from)) }}
                @endisset
                </td>
                <td>
                @isset($task->to)
                    {{ date('d. m. Y', strtotime($task->to)) }}
                @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/tasks/create" class="btn btn-info">Create new task</a>
@endsection
