<div class="mb-3">

    @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-primary">
            Dashboard
        </a>
    @endif

    @if(Auth::user()->role == 'guru')
        <a href="{{ route('guru.dashboard') }}"
           class="btn btn-primary">
            Dashboard
        </a>
    @endif

    @if(Auth::user()->role == 'siswa')
        <a href="{{ route('siswa.dashboard') }}"
           class="btn btn-primary">
            Dashboard
        </a>
    @endif

</div>