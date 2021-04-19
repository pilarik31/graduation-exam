@if(Session::has('error'))
    <div class="error">
        {{ Session::get('error') }}
        @php
            Session::forget('error');
        @endphp
    </div>
@endif
