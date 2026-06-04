@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h4>Tambah Guru</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('guru.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">ID Guru</label>
                    <input type="text"
                           name="id_guru"
                           class="form-control"
                           value="{{ old('id_guru') }}">

                    @error('id_guru')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Guru</label>
                    <input type="text"
                           name="nama_guru"
                           class="form-control"
                           value="{{ old('nama_guru') }}">

                    @error('nama_guru')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>

                    <select name="mata_pelajaran_id" class="form-control">

                        <option value="">
                            -- Pilih Mata Pelajaran --
                        </option>

                        @foreach($mataPelajarans as $mapel)

                            <option value="{{ $mapel->id }}"
                                {{ old('mata_pelajaran_id') == $mapel->id ? 'selected' : '' }}>

                                {{ $mapel->nama_mapel }}

                            </option>

                        @endforeach

                    </select>

                    @error('mata_pelajaran_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <h5>Akun Login Guru</h5>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('guru.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection