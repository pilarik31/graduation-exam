@extends('layouts.master')

@section('title', "$task->title - Task edit")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasks.update', [$task->id]) }}" method="POST">
                    @method('PATCH')
                    <div class="form-group">
                        @csrf
                        <label for="title">Task name</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
                        @error('title')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="description">Description</label>
                        <textarea type="" name="description" id="description" class="form-control">{{ $task->description }}</textarea>

                        <label for="from">From</label>
                        <input type="date" name="from" id="from" class="form-control"
                        value=
                        "@isset($task->from)
                            {{ date('Y-m-d', strtotime($task->from)) }}
                        @endisset
                        ">

                        <label for="to">To</label>
                        <input type="date" name="to" id="to" class="form-control"
                        value=
                        "@isset($task->to)
                            {{ date('Y-m-d', strtotime($task->to)) }}
                        @endisset
                        ">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
