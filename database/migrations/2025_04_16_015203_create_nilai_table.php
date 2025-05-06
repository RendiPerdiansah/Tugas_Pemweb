<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->string('id_nilai', 30)->primary();
            $table->string('nim', 20);
            $table->integer('id_matakuliah');
            $table->integer('id_tahun_akademik');
            $table->integer('id_semester');
            $table->integer('id_kelas');
            $table->integer('id_jurusan');
            $table->integer('id_prodi');
            $table->double('komposisi_nilai_uts');
            $table->double('komposisi_nilai_uas');
            $table->double('komposisi_nilai_tugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
