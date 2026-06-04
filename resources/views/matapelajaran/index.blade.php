@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Data Mata Pelajaran</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mata Pelajaran</th>
            </tr>
        </thead>

        <tbody>
            @forelse($mataPelajarans as $mapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mapel->nama_mapel }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">
                        Belum ada data mata pelajaran
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection