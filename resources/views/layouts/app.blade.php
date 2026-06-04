<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex min-vh-100">


        <aside class="bg-primary text-white p-3 shadow-sm min-vh-100" style="width: 250px;">
            <h5 class="fw-bold mb-4">Sistem Nilai</h5>

            <ul class="nav flex-column gap-2">

                @if(auth()->user()->role == 'admin')
                    <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                    <li><a href="{{ route('siswa.index') }}" class="nav-link text-white">Data Siswa</a></li>
                    <li><a href="{{ route('guru.index') }}" class="nav-link text-white">Data Guru</a></li>
                    <li><a href="{{ route('mata-pelajaran.index') }}" class="nav-link text-white">Mata Pelajaran</a></li>
                    <li><a href="{{ route('nilai.index') }}" class="nav-link text-white">Data Nilai</a></li>
                    <li><a href="{{ route('admin.laporan-nilai') }}" class="nav-link text-white">Laporan Nilai</a></li>
                @endif

                @if(auth()->user()->role == 'guru')
                    <li><a href="{{ route('guru.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                    <li><a href="{{ route('nilai.index') }}" class="nav-link text-white">Kelola Nilai</a></li>
                    <li><a href="{{ route('nilai.create') }}" class="nav-link text-white">Input Nilai</a></li>
                    <li><a href="{{ route('guru.rekap-nilai') }}" class="nav-link text-white">Rekap Nilai</a></li>
                @endif

                @if(auth()->user()->role == 'siswa')
                    <li><a href="{{ route('siswa.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                    <li><a href="{{ route('siswa.nilai-pribadi') }}" class="nav-link text-white">Nilai Pribadi</a></li>
                @endif

            </ul>
        </aside>

        <div class="flex-grow-1 bg-light">

            <nav class="navbar navbar-light bg-white px-4 shadow-sm">
                <span class="navbar-brand fw-bold text-primary">
                    Sistem Pengolahan Nilai Siswa
                </span>

                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">
                        Logout
                    </button>
                </form>
                @endauth
            </nav>

            <main class="p-4">
                @yield('content')
            </main>

        </div>

    </div>
</body>
</html>