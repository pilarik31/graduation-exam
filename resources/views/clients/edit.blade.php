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
                        <label for="firstname">@lang('clients.firstname')</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $client->firstname }}">
                        @error('firstname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="lastname">@lang('clients.lastname')</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $client->lastname }}">
                        @error('lastname')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="email">@lang('clients.email')</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $client->email }}">
                        @error('email')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="password">@lang('clients.password')</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="address">@lang('clients.address')</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $client->address }}">
                        @error('address')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="city">@lang('clients.city')</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $client->city }}">
                        @error('city')
                            <div class="alert alert-danger text-danger">{{ $message  }}</div>
                        @enderror

                        <label for="role_id">@lang('clients.role.select')</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($roles as $role)
                                @if ($client->role->id === $role->id)
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
