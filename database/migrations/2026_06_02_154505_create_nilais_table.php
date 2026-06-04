<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')
                  ->constrained('siswas')
                  ->onDelete('cascade');

            $table->foreignId('guru_id')
                  ->constrained('gurus')
                  ->onDelete('cascade');

            $table->foreignId('mata_pelajaran_id')
                  ->constrained('mata_pelajarans')
                  ->onDelete('cascade');

            $table->integer('nilai_tugas');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');

            $table->decimal('nilai_akhir', 5, 2)->nullable();

            $table->enum('status', [
            'Lulus',
            'Tidak Lulus'
        ])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
