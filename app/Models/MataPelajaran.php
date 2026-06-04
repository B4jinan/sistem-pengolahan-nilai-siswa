<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = [
        'nama_mapel',
    ];

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}