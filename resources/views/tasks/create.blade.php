@extends('layouts.master')

@section('title', 'Task create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasks.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="title">Task name</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('title')  }}</div>
                        @endif

                        <label for="description">Description</label>
                        <textarea type="" name="description" id="description" class="form-control"></textarea>

                        <label for="from">From</label>
                        <input type="date" name="from" id="from" class="form-control">

                        <label for="to">To</label>
                        <input type="date" name="to" id="to" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
