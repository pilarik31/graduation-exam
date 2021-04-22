@extends('layouts.master')

@section('title', __('tasks.plural'))

@section('content')
    <h1>@lang('tasks.plural')</h1>

    @include('partials.success')

    <table class="table">
        <thead>
            <th>@lang('tasks.singular')</th>
            <th>@lang('tasks.description')</th>
            <th>@lang('tasks.from')</th>
            <th>@lang('tasks.deadline')</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                @can('view', $task)
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
                @endcan
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-6">
            <a href="{{ route('tasks.create') }}" class="btn btn-info">@lang('tasks.new')</a>
            @can('update', $tasklist)
                <a href="{{ route('tasklists.edit', [$tasklist->id]) }}" class="btn btn-info">@lang('tasklists.edit')</a>
            @endcan

        </div>
        <div class="col-lg-6 col-md-6 col-6 text-right">
            @can('delete', $tasklist)
                <form action="{{ route('tasklists.destroy', [$tasklist->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="@lang('tasklists.delete')" class="btn btn-danger">
                </form>
            @endcan
        </div>
    </div>

@endsection
