@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Data Guru</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('guru.create') }}"
       class="btn btn-primary mb-3">
        Tambah Guru
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Guru</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($gurus as $guru)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $guru->id_guru }}</td>
                <td>{{ $guru->nama_guru }}</td>
                <td>{{ $guru->mataPelajaran->nama_mapel }}</td>

                <td>
                    <a href="{{ route('guru.edit', $guru->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('guru.destroy', $guru->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center">
                    Belum ada data guru
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

@endsection