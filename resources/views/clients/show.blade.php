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
                            <a href="{{ route('clients.edit', [$client->id]) }}" class="btn btn-info">
                                @lang('clients.edit')
                            </a>
                        </div>

                        <div class="col-lg-6 col-md-6 col-6 text-right">
                            <form action="{{ route('clients.destroy', [$client->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="@lang('clients.delete')" class="btn btn-danger">
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <table class="table">
                    <thead>
                        <th>Task</th>
                        <th>Description</th>
                        <th>From</th>
                        <th>Deadline</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
