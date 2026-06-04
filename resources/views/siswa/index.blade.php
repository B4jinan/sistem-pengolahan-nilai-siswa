@extends('layouts.app')

@section('content')


<div class="container">

    <h1>Data Siswa</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('siswa.create') }}"
       class="btn btn-primary mb-3">
        Tambah Siswa
    </a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        @forelse($siswas as $siswa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas }}</td>
                <td>
                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('siswa.destroy', $siswa->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                <td colspan="5" class="text-center">
                    Belum ada data siswa
                </td>
            </tr>
        @endforelse
    </table>

</div>

@endsection