@extends('layouts.master')

@section('title', __('dashboard.dashboard'))

@section('content')
    <h1>@lang('dashboard.dashboard')</h1>

    @include('partials.success')

    <div class="row ml-1">
        <div class="col-lg-6 shadow p-3 bg-white rounded">
            <h3>@lang('dashboard.comments.latest')</h3>
            @foreach($latestComments as $comment)
                <div class="row border-bottom pb-1">
                    <div class="col-lg-6">
                        <img src="{{ Gravatar::src($comment->client->email, 40) }}" class="rounded-circle" alt="Profile picture">
                        <strong>{{ $comment->client->firstname }} {{ $comment->client->lastname }}</strong>
                        &#8594;
                        <a href="{{ route('tasks.show', $comment->task) }}">{{ $comment->task->title }}</a>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <div>{{ date('d. m. Y | H:i:s', strtotime($comment->created_at)) }}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
