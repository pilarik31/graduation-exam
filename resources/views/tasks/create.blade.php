@extends('layouts.master')

@section('title', 'Task create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasks.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="title">@lang('general.tasks.task-name')</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('title')  }}</div>
                        @endif

                        <label for="description">@lang('general.tasks.description')</label>
                        <textarea type="" name="description" id="description" class="form-control"></textarea>

                        <label for="from">@lang('general.tasks.from')</label>
                        <input type="date" name="from" id="from" class="form-control">

                        <label for="to">@lang('general.tasks.deadline')</label>
                        <input type="date" name="to" id="to" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="@lang('general.tasks.new')" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
