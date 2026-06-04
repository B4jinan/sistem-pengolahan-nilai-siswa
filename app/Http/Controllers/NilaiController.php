<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with(['siswa', 'guru', 'mataPelajaran'])->get();

        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $gurus = Guru::with('mataPelajaran')->get();
        $mataPelajarans = MataPelajaran::all();

        return view('nilai.create', compact('siswas', 'gurus', 'mataPelajarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas' => 'required|in:1,2,3,4,5,6',
            'guru_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $cekNilai = Nilai::where('siswa_id', $request->siswa_id)
            ->where('kelas', (string) $request->kelas)
            ->where('mata_pelajaran_id', $request->mata_pelajaran_id)
            ->first();

        if ($cekNilai) {
            return back()
                ->withInput()
                ->withErrors([
                    'siswa_id' => 'Siswa ini sudah memiliki nilai untuk mata pelajaran tersebut di kelas yang sama.'
                ]);
        }

        $nilaiAkhir = ($request->nilai_tugas + $request->nilai_uts + $request->nilai_uas) / 3;

        $status = $nilaiAkhir >= 75 ? 'Lulus' : 'Tidak Lulus';

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'kelas' => $request->kelas,
            'guru_id' => $request->guru_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilaiAkhir,
            'status' => $status,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        $gurus = Guru::all();
        $mataPelajarans = MataPelajaran::all();

        return view(
            'nilai.edit',
            compact(
                'nilai',
                'siswas',
                'gurus',
                'mataPelajarans'
            )
        );
    }   

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil dihapus');
    }

    public function update(Request $request, Nilai $nilai)
    {

        $request->validate([
            'siswa_id' => 'required',
            'kelas' => 'required|in:1,2,3,4,5,6',
            'guru_id' => 'required',
            'mata_pelajaran_id' => 'required',
            'nilai_tugas' => 'required|numeric|min:0|max:100',
            'nilai_uts' => 'required|numeric|min:0|max:100',
            'nilai_uas' => 'required|numeric|min:0|max:100',
        ]);

        $cekNilai = Nilai::where('siswa_id', $request->siswa_id)
            ->where('kelas', $request->kelas)
            ->where('mata_pelajaran_id', $request->mata_pelajaran_id)
            ->where('id', '!=', $nilai->id)
            ->exists();

        if ($cekNilai) {
            return back()
                ->withInput()
                ->withErrors([
                    'siswa_id' => 'Siswa ini sudah memiliki nilai untuk mata pelajaran tersebut di kelas yang sama.'
                ]);
        }
        
        $nilaiAkhir = (
            $request->nilai_tugas +
            $request->nilai_uts +
            $request->nilai_uas
        ) / 3;

        $status = $nilaiAkhir >= 75 ? 'Lulus' : 'Tidak Lulus';

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'kelas' => $request->kelas,
            'guru_id' => $request->guru_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilaiAkhir,
            'status' => $status,
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Data nilai berhasil diperbarui');
    }

    public function rekapGuru()
    {
        $nilais = Nilai::with(['siswa', 'guru', 'mataPelajaran'])->get();

        return view('nilai.rekap-guru', compact('nilais'));
    }

    public function laporan()
    {
        $nilais = Nilai::with(['siswa', 'guru', 'mataPelajaran'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('nilai.laporan', compact('nilais'));
    }   

    public function nilaiSiswa()
    {
        $siswa = Siswa::where('user_id', auth()->user()->id)->first();

        if (!$siswa) {
            return view('nilai.nilai-siswa', [
                'nilais' => collect(),
                'siswa' => null
            ]);
        }

        $nilais = Nilai::with(['guru', 'mataPelajaran'])
            ->where('siswa_id', $siswa->id)
            ->get();

        return view('nilai.nilai-siswa', compact('nilais', 'siswa'));
    }

}