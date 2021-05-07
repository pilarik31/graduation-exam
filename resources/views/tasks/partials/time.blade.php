<div class="row mt-5">
    <div class="col-lg-12 col-md-12">
        <div class="shadow p-3 bg-white rounded timer">
            <timer task-id="{{ $task->id }}"></timer>


            @foreach($task->timers as $timer)
            <div class="display-time">
                <strong>{{ $timer->name }}</strong>
                <p>
                    {{ date('d. m. Y | H:i:s', strtotime($timer->started_at)) }} 
                    - 
                    {{ date('d. m. Y | H:i:s', strtotime($timer->stopped_at)) }}
                    &rarr;
                    {{ $timer->stopped_at->diff($timer->started_at)->format('%h hodin %i minut %s sekund') }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>
