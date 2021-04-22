@extends('layouts.master')

@section('title', 'Task create')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12">

                <form action="{{ route('tasklists.store') }}" method="POST">

                    <div class="form-group">
                        @csrf
                        <label for="name">@lang('tasklists.name')</label>
                        <input type="text" name="name" id="name" class="form-control">
                        @error('name')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror

                        <label for="description">@lang('tasklists.description')</label>
                        <textarea type="" name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="@lang('tasklists.new')" class="btn btn-success btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
