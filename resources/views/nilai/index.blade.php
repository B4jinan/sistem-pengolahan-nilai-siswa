@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Data Nilai</h1>

    <a href="{{ route('nilai.create') }}"
       class="btn btn-primary mb-3">
        Input Nilai
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Siswa</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($nilais as $nilai)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nilai->siswa->nama }}</td>
                    <td>Kelas {{ $nilai->kelas }}</td>
                    <td>{{ $nilai->guru->nama_guru }}</td>
                    <td>{{ $nilai->mataPelajaran->nama_mapel }}</td>
                    <td>{{ $nilai->nilai_tugas }}</td>
                    <td>{{ $nilai->nilai_uts }}</td>
                    <td>{{ $nilai->nilai_uas }}</td>
                    <td>{{ $nilai->nilai_akhir }}</td>
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

                    <td>

                        <a href="{{ route('nilai.edit', $nilai->id) }}"
                        class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('nilai.destroy', $nilai->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data nilai ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

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