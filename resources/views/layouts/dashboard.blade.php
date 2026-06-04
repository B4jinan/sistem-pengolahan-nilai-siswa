<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Nilai Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="d-flex">

    <div class="bg-primary text-white p-3 min-vh-100" style="width: 260px;">
        <h4 class="fw-bold mb-4">Sistem Nilai Siswa</h4>

        <ul class="nav flex-column gap-2">

            @if(Auth::user()->role == 'admin')
                <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li><a href="{{ route('siswa.index') }}" class="nav-link text-white">Data Siswa</a></li>
                <li><a href="{{ route('guru.index') }}" class="nav-link text-white">Data Guru</a></li>
                <li><a href="{{ route('mata-pelajaran.index') }}" class="nav-link text-white">Mata Pelajaran</a></li>
                <li><a href="{{ route('nilai.index') }}" class="nav-link text-white">Data Nilai</a></li>
                <li><a href="{{ route('admin.laporan-nilai') }}" class="nav-link text-white">Laporan Nilai</a></li>
            @endif

            @if(Auth::user()->role == 'guru')
                <li><a href="{{ route('guru.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li><a href="{{ route('nilai.index') }}" class="nav-link text-white">Kelola Nilai</a></li>
                <li><a href="{{ route('guru.rekap-nilai') }}" class="nav-link text-white">Rekap Nilai</a></li>
            @endif

            @if(Auth::user()->role == 'siswa')
                <li><a href="{{ route('siswa.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                <li><a href="{{ route('siswa.nilai-pribadi') }}" class="nav-link text-white">Nilai Saya</a></li>
            @endif

            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-light w-100">Logout</button>
                </form>
            </li>

        </ul>
    </div>

    <div class="flex-grow-1">

        <div class="bg-white shadow-sm px-4 py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">@yield('title')</h5>
            <span class="text-muted">
                {{ Auth::user()->name }} | {{ ucfirst(Auth::user()->role) }}
            </span>
        </div>

        <div class="p-4">
            @yield('content')

        </div>

    </div>

</div>

</body>
</html>