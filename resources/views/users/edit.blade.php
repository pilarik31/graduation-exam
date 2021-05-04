@extends('layouts.master')

@section('title', "$user->firstname - Task edit")

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">
                <form action="{{ route('users.update', [$user->id]) }}" method="POST">
                    @method('PATCH')
                    <div class="form-group">
                        @csrf
                        <label for="firstname">@lang('users.firstname')</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $user->firstname }}">
                        @error('firstname')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="lastname">@lang('users.lastname')</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $user->lastname }}">
                        @error('lastname')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="email">@lang('users.email')</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        @error('email')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="password">@lang('users.password')</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="phone">@lang('users.phone')</label>
                        <input type="phone" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                        @error('phone')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="birthday">@lang('users.birthday')</label>
                        <input type="date" name="birthday" id="birthday" class="form-control">
                        @error('birthday')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="address">@lang('users.address')</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                        @error('address')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="city">@lang('users.city')</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $user->city }}">
                        @error('city')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="role_id">@lang('users.role.select')</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                @if ($user->role->id === $role->id)
                                    <option selected="selected" value="{{ $role->id }}">{{ __("roles.$role->name") }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ __("roles.$role->name") }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
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
