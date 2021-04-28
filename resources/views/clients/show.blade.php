@extends('layouts.master')

@section('title', "$client->firstname - Client detail")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <div class="shadow p-3 bg-white rounded">
                    <h2>{{ $client->firstname }} {{ $client->lastname  }}</h2>
                    <p>
                        <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                    </p>
                    <ul>
                        <li>
                            @lang('clients.phone'):
                            <a href="tel:{{ $client->phone }}">
                                {{ $client->phone }}
                            </a>
                        </li>
                        <li>@lang('clients.birthday'): {{ date('d. m. Y', strtotime($client->birthday)) }}</li>
                        <li>@lang('clients.address'): {{ $client->address }}</li>
                        <li>@lang('clients.city'): {{ $client->city }}</li>
                        <li>@lang('clients.role.singular'): {{ __('roles.' . $client->role->name) }}</li>
                    </ul>

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-6">
                            @can('edit', $client)
                                <a href="{{ route('clients.edit', [$client->id]) }}" class="btn btn-info">
                                    @lang('clients.edit')
                                </a>
                            @endcan
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 text-right">
                            @can('delete', $client)
                                <form action="{{ route('clients.destroy', [$client->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="@lang('clients.delete')" class="btn btn-danger">
                                </form>
                            @endcan
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <h3>@lang('tasks.client.created')</h3>
                <table class="table">
                    <thead>
                        <th>@lang('tasks.singular')</th>
                        <th>@lang('tasks.description')</th>
                        <th>@lang('tasks.from')</th>
                        <th>@lang('tasks.deadline')</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <h3>@lang('tasks.client.assigned')</h3>
                <table class="table">
                    <thead>
                        <th>@lang('tasks.singular')</th>
                        <th>@lang('tasks.description')</th>
                        <th>@lang('tasks.from')</th>
                        <th>@lang('tasks.deadline')</th>
                    </thead>
                    <tbody>
                        @foreach ($implements as $task)
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
