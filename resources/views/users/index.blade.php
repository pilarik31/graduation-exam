@extends('layouts.master')

@section('title', __('users.plural'))

@section('content')
    <h1>@lang('users.plural')</h1>

    @include('partials.success')

    <table class="table" id="table-user">
        <thead>
            <th>@lang('users.name')</th>
            <th>@lang('users.email')</th>
            <th>@lang('users.address')</th>
            <th>@lang('users.city')</th>
            <th>@lang('users.role.singular')</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @can('view', $user)
                <tr>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">
                            {{ $user->firstname }} {{ $user->lastname }}
                        </a>
                    </td>
                    <td class="">{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ __('roles.' . $user->role->name) }}</td>
                </tr>
                @endcan
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}" class="btn btn-info">@lang('users.new')</a>

@endsection
