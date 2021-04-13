<form action="{{ route('comments.store') }}" method="POST">
    <div class="form-group">
        @csrf
        <input type="hidden" name="task_id" value="{{ $task->id }}">
        <label for="content">Comment</label>
        <textarea type="" name="content" id="content" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Comment" class="btn btn-success btn-submit">
    </div>
</form>
