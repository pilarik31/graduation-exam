@foreach($comments as $comment)
<div class="display-comment">
    <img src="{{ Gravatar::src($comment->client->email, 40) }}" class="rounded-circle">
    <strong>{{ $comment->client->firstname }} {{ $comment->client->lastname }}</strong>
    <p>{{ $comment->content }}</p>
</div>
@endforeach
