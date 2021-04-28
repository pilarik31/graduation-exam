@extends('layouts.master')

@section('title', __('tasks.plural'))

@section('content')
    <h1>@lang('tasks.plural')</h1>

    @include('partials.success')

    <table class="table">
        <thead>
            <th>@lang('tasks.singular')</th>
            <th>@lang('tasks.implementer')</th>
            <th>@lang('tasks.description')</th>
            <th>@lang('tasks.from')</th>
            <th>@lang('tasks.deadline')</th>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                @can('view', $task)
                <tr>
                    <td>
                        @can('complete', $task)
                            <form class="complete-form" action="{{ route('tasks.complete', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn {{ ($task->completed) ? 'complete--completed' : 'complete' }}" onclick="this.form.submit">
                                    <i class="checkmark"></i>
                                </button>
                            </form>
                        @endcan
                        <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                    </td>
                    <td></td>
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

    <a href="{{ route('tasks.create') }}" class="btn btn-info">@lang('tasks.new')</a>
@endsection
