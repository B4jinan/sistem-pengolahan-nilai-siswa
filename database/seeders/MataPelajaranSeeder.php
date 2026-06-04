<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $dataMapel = [
            'Matematika',
            'IPA',
            'Bahasa Indonesia',
            'IPS',
            'Bahasa Inggris',
        ];

        foreach ($dataMapel as $mapel) {
            MataPelajaran::create([
                'nama_mapel' => $mapel,
            ]);
        }
    }
}