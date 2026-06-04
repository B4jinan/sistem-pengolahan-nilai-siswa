@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')

<h3 class="mb-4">Dashboard Admin</h3>

<div class="row g-3 mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Siswa</h6>
                <h3>{{ $totalSiswa }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Guru</h6>
                <h3>{{ $totalGuru }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total Nilai</h6>
                <h3>{{ $totalNilai }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Jumlah Lulus</h6>
                <h3>{{ $jumlahLulus }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Tidak Lulus</h6>
                <h3>{{ $jumlahTidakLulus }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="row g-4">

    <div class="col-md-4">
        <a href="{{ route('siswa.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Data Siswa</h5>
                    <p class="text-muted mb-0">Kelola data siswa SD</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('guru.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Data Guru</h5>
                    <p class="text-muted mb-0">Kelola data guru</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ route('admin.laporan-nilai') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Laporan Nilai</h5>
                    <p class="text-muted mb-0">Lihat laporan nilai siswa</p>
                </div>
            </div>
        </a>
    </div>

</div>

@endsection