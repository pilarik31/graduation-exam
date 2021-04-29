@extends('layouts.master')

@section('title', "$task->title - Task detail")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    <h2>{{ $task->title }} - {{ $task->tasklist->name }}
                        @can('complete', $task)
                        <form class="complete-form" action="{{ route('tasks.complete', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn {{ ($task->completed) ? 'complete--completed' : 'complete' }}" onclick="this.form.submit">
                                <i class="checkmark"></i>
                            </button>
                        </form>
                        @endcan
                    </h2>
                    <h4>
                        @lang('clients.singular'):
                        <a href="{{ route("clients.show", [$task->client->id]) }}">
                            {{ $task->client->firstname }} {{ $task->client->lastname }}
                        </a>
                    </h4>
                    <h4>
                        @lang('tasks.implementer'):
                        <a href="{{ route('clients.show', $implementer->id) }}">
                            {{ $implementer->firstname . ' ' . $implementer->lastname }}
                        </a>
                    </h4>
                    <p>{{ $task->description }}</p>
                    @isset($task->from)
                        <div>@lang('tasks.from'): {{ date('d. m. Y', strtotime($task->from)) }}</div>
                    @endisset
                    @isset($task->from)
                        <div>@lang('tasks.deadline'): {{ date('d. m. Y', strtotime($task->to)) }}</div>
                    @endisset

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-6">
                            @can('update', $task)
                                <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-info">@lang('tasks.edit')</a>
                            @endcan
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 text-right">
                            @can('delete', $task)
                                <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="@lang('tasks.delete')" class="btn btn-danger">
                                </form>
                            @endcan
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    @include(
                        'comments.index',
                        ['comments' => $task->comments]
                    )
                    @include(
                        'comments.create'
                    )
                </div>
            </div>
        </div>
    </div>
@endsection
