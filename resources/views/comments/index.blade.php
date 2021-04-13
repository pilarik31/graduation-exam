@foreach($comments as $comment)
<div class="display-comment">
    <strong>{{ $comment->client->firstname }} {{ $comment->client->lastname }}</strong>
    <p>{{ $comment->content }}</p>
</div>
@endforeach
