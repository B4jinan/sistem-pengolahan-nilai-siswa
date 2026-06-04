@extends('layouts.dashboard')

@section('title', 'Dashboard Siswa')

@section('content')

<div class="row g-4">

    <div class="col-md-6">
        <a href="{{ route('siswa.nilai-pribadi') }}" class="text-decoration-none">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-primary">Nilai Saya</h5>
                    <p class="text-muted mb-0">Lihat nilai dan status kelulusan</p>
                </div>
            </div>
        </a>
    </div>

</div>

@endsection