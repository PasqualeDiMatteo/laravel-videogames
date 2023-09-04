@if (session('message'))
    <div class="alert alert-{{ 'type' }} mt-5" role="alert">
        {{ session('message') }}
    </div>
@endif
