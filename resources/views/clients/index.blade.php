@extends('layouts.master')

@section('title', __('clients.plural'))

@section('content')
    <h1>@lang('clients.plural')</h1>

    @include('partials.success')

    <table class="table" id="table-client">
        <thead>
            <th>@lang('clients.name')</th>
            <th>@lang('clients.email')</th>
            <th>@lang('clients.address')</th>
            <th>@lang('clients.city')</th>
            <th>@lang('clients.role.singular')</th>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                @can('view', $client)
                <tr>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}">
                            {{ $client->firstname }} {{ $client->lastname }}
                        </a>
                    </td>
                    <td class="">{{ $client->email }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->city }}</td>
                    <td>{{ __('roles.' . $client->role->name) }}</td>
                </tr>
                @endcan
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('clients.create') }}" class="btn btn-info">@lang('clients.new')</a>

@endsection
