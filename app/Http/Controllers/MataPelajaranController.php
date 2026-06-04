<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajarans = MataPelajaran::all();

        return view('matapelajaran.index', compact('mataPelajarans'));
    }
}