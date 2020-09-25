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
                        @if ($errors->has('title'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('title')  }}</div>
                        @endif

                        <label for="description">Description</label>
                        <textarea type="" name="description" id="description" class="form-control">{{ $task->description }}</textarea>

                        <label for="from">From</label>
                        <input type="date" name="from" id="from" class="form-control" 
                        value=
                        "@if (isset($task->from))
                            {{ date('Y-m-d', strtotime($task->from)) }}
                        @endif
                        ">

                        <label for="to">To</label>
                        <input type="date" name="to" id="to" class="form-control"
                        value=
                        "@if (isset($task->to))
                            {{ date('Y-m-d', strtotime($task->to)) }}
                        @endif
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
