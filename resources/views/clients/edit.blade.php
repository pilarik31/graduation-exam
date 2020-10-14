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
                        @error('firstname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="lastname">Client lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $client->lastname }}">
                        @error('lastname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $client->email }}">
                        @error('email')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $client->address }}">
                        @error('address')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $client->city }}">
                        @error('city')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="role_id">[TEMP] Role ID</label>
                        <input type="text" name="role_id" id="role_id" class="form-control" value="{{ $client->role_id }}">
                        @error('role_id')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
