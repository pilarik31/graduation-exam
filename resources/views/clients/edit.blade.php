@extends('layouts.master')

@section('title', "$client->firstname - Task edit")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('clients.update', [$client->id]) }}" method="POST">
                    @method('PATCH')
                    <div class="form-group">
                        @csrf
                        <label for="firstname">Client firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $client->firstname }}">
                        @if ($errors->has('firstname'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('firstname')  }}</div>
                        @endif

                        <label for="lastname">Client lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $client->lastname }}">
                        @if ($errors->has('lastname'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('lastname')  }}</div>
                        @endif

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $client->email }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('email')  }}</div>
                        @endif

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('password')  }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
