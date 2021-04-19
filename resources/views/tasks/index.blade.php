@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
    <h1>@lang('general.tasks.tasks')</h1>

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

    <a href="/tasks/create" class="btn btn-info">@lang('general.tasks.new')</a>
@endsection
