@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Rekap Nilai Guru</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Kelas</th>
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
                    <td>{{ $nilai->siswa->nama }}</td>
                    <td>{{ $nilai->siswa->kelas }}</td>
                    <td>{{ $nilai->mataPelajaran->nama_mapel }}</td>
                    <td>{{ $nilai->nilai_tugas }}</td>
                    <td>{{ $nilai->nilai_uts }}</td>
                    <td>{{ $nilai->nilai_uas }}</td>
                    <td>{{ number_format($nilai->nilai_akhir, 2) }}</td>
                    <td>{{ $nilai->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">
                        Belum ada data nilai
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection