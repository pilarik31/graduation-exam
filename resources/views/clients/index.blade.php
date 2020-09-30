@extends('layouts.master')

@section('title', 'Client area')

@section('content')
    <h1>Welcome in the client area!</h1>

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
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>
                    <a href="{{ route('clients.show', $client->id) }}">
                        {{ $client->firstname }} {{ $client->lastname }}
                    </a>
                </td>
                <td class="w-50">{{ $client->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/clients/create" class="btn btn-info">Create new client</a>
@endsection
