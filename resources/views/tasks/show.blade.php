@extends('layouts.master')

@section('title', "$task->title - Task detail")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    <h2>{{ $task->title }}</h2>
                    <h4>
                        Client:
                        <a href="{{ url("/clients", [$task->client->id]) }}">
                            {{ $task->client->firstname }} {{ $task->client->lastname }}
                        </a>
                    </h4>
                    <p>{{ $task->description }}</p>
                    @isset($task->from)
                        <div>Started: {{ date('d. m. Y', strtotime($task->from)) }}</div>
                    @endisset
                    @isset($task->from)
                        <div>Deadline: {{ date('d. m. Y', strtotime($task->to)) }}</div>
                    @endisset

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-6">
                            <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-info">Edit</a>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 text-right">
                            <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
