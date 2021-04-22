@extends('layouts.master')

@section('title', "$tasklist->name - Task edit")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasklists.update', [$tasklist->id]) }}" method="POST">
                    @method('PATCH')
                    <div class="form-group">
                        @csrf
                        <label for="name">@lang('tasklists.task-name')</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $tasklist->name }}">
                        @error('name')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="description">@lang('tasklists.description')</label>
                        <textarea type="" name="description" id="description" class="form-control">{{ $tasklist->description }}</textarea>

                    </div>

                    <div class="form-group">
                        <input type="submit" value="@lang('tasklists.save')" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
