@foreach($comments as $comment)
<div class="display-comment">
    <img src="{{ Gravatar::src($comment->user->email, 40) }}" class="rounded-circle">
    <strong>{{ $comment->user->firstname }} {{ $comment->user->lastname }}</strong>
    <p>{{ $comment->content }}</p>
</div>
@endforeach
