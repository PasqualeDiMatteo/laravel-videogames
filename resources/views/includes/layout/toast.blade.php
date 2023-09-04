@if (session('toast-message'))
    <div class="toast align-items-center text-bg-{{ session('toast-class') }} border-0 show  position-fixed bottom-0 end-0 p-3"
        role="alert">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('toast-message') }}
            </div>
            {{-- Restore Button --}}
            <form action="{{ route('admin.games.restore', $game) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-success">Annulla</button>
            </form>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" onclick="closeBtn()"></button>
        </div>
    </div>
@endif

<script>
    // Create function close button at click
    function closeBtn() {
        const toastDiv = document.querySelector('.toast');
        toastDiv.classList.remove('show');
    }
</script>
