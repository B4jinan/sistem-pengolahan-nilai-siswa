@extends('layouts.dashboard')

@section('title', 'Dashboard Guru')

@section('content')

<div class="row g-4">

    <div class="col-md-6">
        <a href="{{ route('nilai.index') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Kelola Nilai</h5>
                    <p class="text-muted mb-0">Input, edit, dan hapus nilai siswa</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6">
        <a href="{{ route('guru.rekap-nilai') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Rekap Nilai</h5>
                    <p class="text-muted mb-0">Lihat rekap nilai yang sudah diinput</p>
                </div>
            </div>
        </a>
    </div>

</div>

@endsection