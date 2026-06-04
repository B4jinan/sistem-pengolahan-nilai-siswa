@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Nilai</h1>

    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Siswa</label>
            <select name="siswa_id" class="form-control">
                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $nilai->siswa_id == $siswa->id ? 'selected' : '' }}>
                        {{ $siswa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="1" {{ old('kelas', $nilai->kelas) == '1' ? 'selected' : '' }}>Kelas 1</option>
                <option value="2" {{ old('kelas', $nilai->kelas) == '2' ? 'selected' : '' }}>Kelas 2</option>
                <option value="3" {{ old('kelas', $nilai->kelas) == '3' ? 'selected' : '' }}>Kelas 3</option>
                <option value="4" {{ old('kelas', $nilai->kelas) == '4' ? 'selected' : '' }}>Kelas 4</option>
                <option value="5" {{ old('kelas', $nilai->kelas) == '5' ? 'selected' : '' }}>Kelas 5</option>
                <option value="6" {{ old('kelas', $nilai->kelas) == '6' ? 'selected' : '' }}>Kelas 6</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Guru</label>
            <select name="guru_id" class="form-control">
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ $nilai->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama_guru }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <select name="mata_pelajaran_id" class="form-control">
                @foreach($mataPelajarans as $mapel)
                    <option value="{{ $mapel->id }}" {{ $nilai->mata_pelajaran_id == $mapel->id ? 'selected' : '' }}>
                        {{ $mapel->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nilai Tugas</label>
            <input type="number" name="nilai_tugas" value="{{ $nilai->nilai_tugas }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nilai UTS</label>
            <input type="number" name="nilai_uts" value="{{ $nilai->nilai_uts }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nilai UAS</label>
            <input type="number" name="nilai_uas" value="{{ $nilai->nilai_uas }}" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>

        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

@endsection