@extends('layouts.master')

@section('title', 'User create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('users.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="firstname">@lang('users.firstname')</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                        @error('firstname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="lastname">@lang('users.lastname')</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                        @error('lastname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="email">@lang('users.email')</label>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="password">@lang('users.password')</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="phone">@lang('users.phone')</label>
                        <input type="phone" name="phone" id="phone" class="form-control">
                        @error('phone')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="birthday">@lang('users.birthday')</label>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                        @error('birthday')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="address">@lang('users.address')</label>
                        <input type="text" name="address" id="address" class="form-control">
                        @error('address')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="city">@lang('users.city')</label>
                        <input type="text" name="city" id="city" class="form-control">
                        @error('city')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="role_id">@lang('users.role.select')</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ __("roles.$role->name") }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror


                    </div>

                    <div class="form-group">
                        <input type="submit" value="@lang('general.save')" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
