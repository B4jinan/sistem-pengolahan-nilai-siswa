<div class="bg-dark text-white min-vh-100" style="width: 240px;">

    <div class="text-center py-4 border-bottom border-secondary">
        <div class="fw-bold fs-4">SINWA</div>
        <small>Sistem Nilai Siswa</small>
    </div>

    <div class="text-center py-3 border-bottom border-secondary">
        <div class="fw-bold">{{ Auth::user()->name }}</div>
        <small class="text-uppercase">{{ Auth::user()->role }}</small>
    </div>

    <div class="nav flex-column p-3 gap-2">

        @php
            $dashboardRoute = match(Auth::user()->role) {
                'admin' => 'admin.dashboard',
                'guru' => 'guru.dashboard',
                'siswa' => 'siswa.dashboard',
                default => 'login'
            };
        @endphp

        <a href="{{ route($dashboardRoute) }}" class="btn btn-outline-light text-start">
            Dashboard
        </a>

        @if(Auth::user()->role == 'admin')
            <a href="{{ route('siswa.index') }}" class="btn btn-outline-light text-start">
                Data Siswa
            </a>

            <a href="{{ route('guru.index') }}" class="btn btn-outline-light text-start">
                Data Guru
            </a>

            <a href="{{ route('mata-pelajaran.index') }}" class="btn btn-outline-light text-start">
                Mata Pelajaran
            </a>

            <a href="{{ route('nilai.index') }}" class="btn btn-outline-light text-start">
                Data Nilai
            </a>

            <a href="{{ route('admin.laporan-nilai') }}" class="btn btn-outline-light text-start">
                Laporan Nilai
            </a>
        @endif

        @if(Auth::user()->role == 'guru')
            <a href="{{ route('nilai.index') }}" class="btn btn-outline-light text-start">
                Kelola Nilai
            </a>

            <a href="{{ route('guru.rekap-nilai') }}" class="btn btn-outline-light text-start">
                Rekap Nilai
            </a>
        @endif

        @if(Auth::user()->role == 'siswa')
            <a href="{{ route('siswa.nilai-pribadi') }}" class="btn btn-outline-light text-start">
                Nilai Saya
            </a>
        @endif

    </div>
</div>