@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h4>Edit Guru</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('guru.update', $guru->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">ID Guru</label>
                    <input type="text"
                           name="id_guru"
                           class="form-control"
                           value="{{ old('id_guru', $guru->id_guru) }}">

                    @error('id_guru')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru', $guru->nama_guru) }}">

                    @error('nama_guru')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mata_pelajaran_id" class="form-control">
                        <option value="">-- Pilih Mata Pelajaran --</option>

                        @foreach($mataPelajarans as $mapel)
                            <option value="{{ $mapel->id }}"
                                {{ old('mata_pelajaran_id', $guru->mata_pelajaran_id) == $mapel->id ? 'selected' : '' }}>
                                {{ $mapel->nama_mapel }}
                            </option>
                        @endforeach
                    </select>

                    @error('mata_pelajaran_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection