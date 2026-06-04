<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\NilaiController;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Nilai;



    Route::get('/', function () {
        if (auth()->check()) {
            return match (auth()->user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'guru' => redirect()->route('guru.dashboard'),
                'siswa' => redirect()->route('siswa.dashboard'),
                default => redirect()->route('login'),
            };
        }

        return redirect()->route('login');
    });

    Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalNilai = Nilai::count();

        $jumlahLulus = Nilai::where('status', 'Lulus')->count();
        $jumlahTidakLulus = Nilai::where('status', 'Tidak Lulus')->count();

        $rataRataNilai = Nilai::avg('nilai_akhir');

        return view('admin.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'totalNilai',
            'jumlahLulus',
            'jumlahTidakLulus',
            'rataRataNilai'
        ));
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/guru/dashboard', function () {
        return view('guru.dashboard');
    })->middleware('role:guru')->name('guru.dashboard');

    Route::get('/siswa/dashboard', function () {
        return view('siswa.dashboard');
    })->middleware('role:siswa')->name('siswa.dashboard');

    Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index'])
    ->middleware('role:admin')
    ->name('mata-pelajaran.index');

    Route::get('/siswa/nilai-pribadi', [NilaiController::class, 'nilaiSiswa'])
    ->middleware('role:siswa')
    ->name('siswa.nilai-pribadi');

    Route::resource('/siswa', SiswaController::class)
    ->middleware('role:admin');

    Route::get('/guru/rekap-nilai', [NilaiController::class, 'rekapGuru'])
    ->middleware('role:guru')
    ->name('guru.rekap-nilai');

    Route::resource('/guru', GuruController::class)
    ->middleware('role:admin');

    Route::get('/admin/laporan-nilai', [NilaiController::class, 'laporan'])
    ->middleware('role:admin')
    ->name('admin.laporan-nilai');



    Route::resource('/nilai', NilaiController::class)
    ->middleware('role:admin,guru');



});

require __DIR__.'/auth.php';
