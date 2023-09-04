@if (session('message'))
    <div class="alert alert-{{ session('type') }} mt-5 alert-dismissible" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
