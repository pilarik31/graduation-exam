@extends('layouts.master')

@section('title', "$task->title - Task detail")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    <h2>{{ $task->title }}</h2>
                    <h4>
                        @lang('clients.singular'):
                        <a href="{{ route("clients.show", [$task->client->id]) }}">
                            {{ $task->client->firstname }} {{ $task->client->lastname }}
                        </a>
                    </h4>
                    <h4>
                        Implementer:
                        @dump($task->implementer)
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
                                <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-info">@lang('general.edit')</a>
                            @endcan
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 text-right">
                            @can('delete', $task)
                                <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="@lang('general.delete')" class="btn btn-danger">
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
