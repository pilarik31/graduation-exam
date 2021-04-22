@extends('layouts.master')

@section('title', __('tasklists.plural'))

@section('content')
    <h1>@lang('tasklists.plural')</h1>

    @include('partials.success')

    <table class="table">
        <thead>
            <th>@lang('tasklists.singular')</th>
            <th>@lang('tasklists.description')</th>
        </thead>
        <tbody>
            @foreach ($tasklists as $tasklist)
                <tr>
                    <td><a href="{{ route('tasklists.show', $tasklist->id) }}">{{ $tasklist->name }}</a></td>
                    <td class="w-50">{{ $tasklist->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('tasklists.create') }}" class="btn btn-info">@lang('tasklists.new')</a>
@endsection
