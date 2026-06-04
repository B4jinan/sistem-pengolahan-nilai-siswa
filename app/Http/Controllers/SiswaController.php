<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'kelas' => 'required|in:1,2,3,4,5,6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'user_id' => $user->id,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa dan akun login berhasil dibuat');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required',
            'kelas' => 'required|in:1,2,3,4,5,6',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        if ($siswa->user) {
            $siswa->user->update([
                'name' => $request->nama,
            ]);
        }

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->user) {
            $siswa->user->delete();
        }

        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa dan akun login berhasil dihapus');
    }
}