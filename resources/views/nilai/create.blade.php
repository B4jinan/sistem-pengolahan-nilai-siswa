@extends('layouts.app')

@section('content')

<div class="container">
            @error('siswa_id')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
    <h1>Input Nilai</h1>

    <form action="{{ route('nilai.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="kelas" id="kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
                <option value="4">Kelas 4</option>
                <option value="5">Kelas 5</option>
                <option value="6">Kelas 6</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Siswa</label>

            <select name="siswa_id" id="siswa_id" class="form-control" required disabled>
                <option value="">-- Pilih Siswa --</option>

                @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}"
                            data-kelas="{{ $siswa->kelas }}">
                        {{ $siswa->nama }} - Kelas {{ $siswa->kelas }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control" required>
                <option value="">-- Pilih Mata Pelajaran --</option>

                @foreach($mataPelajarans as $mapel)
                    @php
                        $guruMapel = $gurus->where('mata_pelajaran_id', $mapel->id)->first();
                    @endphp

                    <option value="{{ $mapel->id }}" data-guru="{{ $guruMapel->id ?? '' }}">
                        {{ $mapel->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Guru</label>
            <select name="guru_id" id="guru_id" class="form-control" required>
                <option value="">-- Pilih Guru --</option>

                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}"
                        data-mapel="{{ $guru->mata_pelajaran_id }}">
                        {{ $guru->nama_guru }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Tugas</label>
            <input type="number" name="nilai_tugas" class="form-control" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai UTS</label>
            <input type="number" name="nilai_uts" class="form-control" min="0" max="100" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai UAS</label>
            <input type="number" name="nilai_uas" class="form-control" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<script>
    const kelasSelect = document.getElementById('kelas');
    const siswaSelect = document.getElementById('siswa_id');

    const semuaSiswa = Array.from(siswaSelect.options).map(option => ({
        value: option.value,
        text: option.textContent,
        kelas: option.dataset.kelas || ''
    }));

    function isiSiswa(kelasDipilih) {

        siswaSelect.innerHTML = '';

        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = '-- Pilih Siswa --';
        siswaSelect.appendChild(defaultOption);

        semuaSiswa.forEach(siswa => {

            if (
                siswa.value !== '' &&
                siswa.kelas === kelasDipilih
            ) {
                const option = document.createElement('option');

                option.value = siswa.value;
                option.textContent = siswa.text;
                option.dataset.kelas = siswa.kelas;

                siswaSelect.appendChild(option);
            }

        });

        siswaSelect.disabled = false;
    }

    kelasSelect.addEventListener('change', function () {

        if (this.value === '') {

            siswaSelect.disabled = true;

            siswaSelect.innerHTML =
                '<option value="">-- Pilih Siswa --</option>';

            return;
        }

        isiSiswa(this.value);
    });
</script>

@endsection