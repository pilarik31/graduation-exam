@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
    <h1>Welcome in the task area!</h1>
    <table>
        <thead>
            <th>Task</th>
            <th>Description</th>
            <th>From</th>
            <th>Deadline</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->datetime_from }}</td>
                <td>{{ $task->datetime_to }}</td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
