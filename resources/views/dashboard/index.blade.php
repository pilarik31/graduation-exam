@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome in the dashboard area!</h1>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
    @endif
@endsection
