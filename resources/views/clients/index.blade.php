@extends('layouts.master')

@section('title', 'Clients')

@section('content')
    <h1>@lang('general.clients.plural')</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
    @endif

    <table class="table">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>City</th>
            <th>Role</th>
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
                    <td>{{ $client->role_id }}</td>
                </tr>
                @endcan
            @endforeach
        </tbody>
    </table>

    <a href="/clients/create" class="btn btn-info">@lang('general.clients.new')</a>

@endsection
