@extends('layouts.master')

@section('title', 'Task create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasks.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="title">@lang('tasks.task-name')</label>
                        <input type="text" name="title" id="title" class="form-control">
                        @error('title')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="description">@lang('tasks.description')</label>
                        <textarea type="" name="description" id="description" class="form-control"></textarea>

                        <label for="implementer_id">@lang('tasks.implementer')</label>
                        <select name="implementer_id" id="implementer_id" class="form-control">
                            @foreach ($clients->where('role_id', 2) as $implementer)
                                <option value="{{ $implementer->id }}">{{ $implementer->firstname . ' ' . $implementer->lastname }}</option>
                            @endforeach
                        </select>
                        <label for="tasklist_id">@lang('tasklists.singular')</label>
                        <select name="tasklist_id" id="tasklist_id" class="form-control">
                            @foreach ($tasklists as $tasklist)
                                @if ($tasklist->id === $tasklistPreselect)
                                    <option selected="selected" value="{{ $tasklist->id }}">{{ $tasklist->name }}</option>
                                @else
                                    <option value="{{ $tasklist->id }}">{{ $tasklist->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        <div class="row">
                            <div class="col">
                                <label for="from">@lang('tasks.from')</label>
                                <input type="date" name="from" id="from" class="form-control">
                            </div>
                            <div class="col">
                                <label for="to">@lang('tasks.deadline')</label>
                                <input type="date" name="to" id="to" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="@lang('tasks.new')" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
