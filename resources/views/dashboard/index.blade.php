@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
    @endif
@endsection
