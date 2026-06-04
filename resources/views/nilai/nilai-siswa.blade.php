@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Nilai Pribadi Saya</h2>

    @if(!$siswa)
        <div class="alert alert-warning">
            Data siswa belum terhubung dengan akun login ini.
        </div>
    @else
        <div class="card mb-3">
            <div class="card-body">
                <strong>Nama:</strong> {{ $siswa->nama }} <br>
                <strong>NIS:</strong> {{ $siswa->nis }} <br>
                <strong>Kelas:</strong> {{ $siswa->kelas }}
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($nilais as $nilai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $nilai->mataPelajaran->nama_mapel ?? '-' }}</td>
                        <td>{{ $nilai->guru->nama_guru ?? '-' }}</td>
                        <td>{{ $nilai->nilai_tugas }}</td>
                        <td>{{ $nilai->nilai_uts }}</td>
                        <td>{{ $nilai->nilai_uas }}</td>
                        <td>{{ number_format($nilai->nilai_akhir, 2) }}</td>
                        <td>
                            @if($nilai->status == 'Lulus')
                                <span class="badge bg-success">Lulus</span>
                            @else
                                <span class="badge bg-danger">Tidak Lulus</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Belum ada data nilai.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endif
</div>

@endsection