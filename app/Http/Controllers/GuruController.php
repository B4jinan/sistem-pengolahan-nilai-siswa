<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::with('mataPelajaran')->get();

        return view('guru.index', compact('gurus'));
    }

    public function create()
    {
        $mataPelajarans = MataPelajaran::all();

        return view('guru.create', compact('mataPelajarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required|unique:gurus,id_guru',
            'nama_guru' => 'required',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->nama_guru,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        Guru::create([
            'id_guru' => $request->id_guru,
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'user_id' => $user->id,
        ]);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru dan akun login berhasil ditambahkan');
    }

    public function edit(Guru $guru)
    {
        $mataPelajarans = MataPelajaran::all();

        return view('guru.edit', compact('guru', 'mataPelajarans'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'id_guru' => 'required|unique:gurus,id_guru,' . $guru->id,
            'nama_guru' => 'required',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
        ]);

        $guru->update([
            'id_guru' => $request->id_guru,
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
        ]);

        if ($guru->user) {
            $guru->user->update([
                'name' => $request->nama_guru,
            ]);
        }

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->user) {
            $guru->user->delete();
        }

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data guru dan akun login berhasil dihapus');
    }
}