<form action="{{ route('comments.store') }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <label for="content">@lang('comment.comments')</label>
        <textarea type="" name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="@lang('comment.send-comment')" class="btn btn-success btn-submit">
    </div>
</form>
