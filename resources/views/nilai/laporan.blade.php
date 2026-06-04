@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Laporan Nilai Siswa</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
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
                <td>{{ $nilai->siswa->nis }}</td>
                <td>{{ $nilai->siswa->nama }}</td>
                <td>{{ $nilai->siswa->kelas }}</td>
                <td>{{ $nilai->guru->nama_guru }}</td>
                <td>{{ $nilai->mataPelajaran->nama_mapel }}</td>
                <td>{{ $nilai->nilai_tugas }}</td>
                <td>{{ $nilai->nilai_uts }}</td>
                <td>{{ $nilai->nilai_uas }}</td>
                <td>{{ number_format($nilai->nilai_akhir, 2) }}</td>
                <td>
                    @if($nilai->status == 'Lulus')
                        <span class="badge bg-success">
                            Lulus
                        </span>
                    @else
                        <span class="badge bg-danger">
                            Tidak Lulus
                        </span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="11" class="text-center">
                    Belum ada data nilai
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>
</div>

@endsection