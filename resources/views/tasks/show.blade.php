@extends('layouts.master')

@section('title', 'Tasks')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    <h2>{{ $task->title }}</h2>
                    <p>{{ $task->description }}</p>
                    <div>Started: {{ date('d. m. Y', strtotime($task->from)) }}</div>
                    <div>Deadline: {{ date('d. m. Y', strtotime($task->to)) }}</div>
                    <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-danger">Delete</a>
                </div>

            </div>
        </div>
    </div>
@endsection
