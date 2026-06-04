@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">
            <h4>Tambah Siswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" value="{{ old('nis') }}">

                    @error('nis')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">

                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        <option value="1" {{ old('kelas') == '1' ? 'selected' : '' }}>Kelas 1</option>
                        <option value="2" {{ old('kelas') == '2' ? 'selected' : '' }}>Kelas 2</option>
                        <option value="3" {{ old('kelas') == '3' ? 'selected' : '' }}>Kelas 3</option>
                        <option value="4" {{ old('kelas') == '4' ? 'selected' : '' }}>Kelas 4</option>
                        <option value="5" {{ old('kelas') == '5' ? 'selected' : '' }}>Kelas 5</option>
                        <option value="6" {{ old('kelas') == '6' ? 'selected' : '' }}>Kelas 6</option>
                    </select>

                    @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <hr>

                <h5>Akun Login Siswa</h5>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">

                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection