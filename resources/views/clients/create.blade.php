@extends('layouts.master')

@section('title', 'Client create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('clients.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="firstname">Client firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                        @if ($errors->has('firstname'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('firstname')  }}</div>
                        @endif

                        <label for="lastname">Client lastname</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                        @if ($errors->has('lastname'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('lastname')  }}</div>
                        @endif

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('email')  }}</div>
                        @endif

                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('password')  }}</div>
                        @endif

                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control">
                        @if ($errors->has('address'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('address')  }}</div>
                        @endif

                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control">
                        @if ($errors->has('city'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('city')  }}</div>
                        @endif

                        <label for="role_id">[TEMP] Role ID</label>
                        <input type="text" name="role_id" id="role_id" class="form-control">
                        @if ($errors->has('role_id'))
                            <div class="alert alert-danger text-danger">{{ $errors->first('role_id')  }}</div>
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
