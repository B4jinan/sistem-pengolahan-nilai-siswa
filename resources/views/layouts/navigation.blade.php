@php
    $dashboardRoute = match (Auth::user()->role) {
        'admin' => 'admin.dashboard',
        'guru' => 'guru.dashboard',
        'siswa' => 'siswa.dashboard',
        default => 'login',
    };
@endphp

<nav class="bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">

            <div>
                <a href="{{ route($dashboardRoute) }}"
                   class="text-decoration-none fw-bold fs-4">
                    Sistem Nilai Siswa
                </a>
            </div>

            <div class="d-flex align-items-center gap-3 flex-wrap">

                <a href="{{ route($dashboardRoute) }}"
                   class="btn btn-outline-primary">
                    Dashboard
                </a>

                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('siswa.index') }}" class="btn btn-outline-success">
                        Data Siswa
                    </a>

                    <a href="{{ route('guru.index') }}" class="btn btn-outline-info">
                        Data Guru
                    </a>

                    <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-outline-secondary">
                        Mata Pelajaran
                    </a>

                    <a href="{{ route('nilai.index') }}" class="btn btn-outline-warning">
                        Data Nilai
                    </a>

                    <a href="{{ route('admin.laporan-nilai') }}" class="btn btn-outline-dark">
                        Laporan Nilai
                    </a>
                @endif

                @if(Auth::user()->role == 'guru')
                    <a href="{{ route('guru.rekap-nilai') }}" class="btn btn-outline-success">
                        Rekap Nilai
                    </a>
                @endif

                @if(Auth::user()->role == 'siswa')
                    <a href="{{ route('siswa.nilai-pribadi') }}" class="btn btn-outline-success">
                        Nilai Saya
                    </a>
                @endif

                <span>
                    {{ Auth::user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </div>
</nav>