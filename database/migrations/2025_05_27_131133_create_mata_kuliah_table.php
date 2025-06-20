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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->integer('id_matakuliah')->primary();
            $table->string('kode_matakuliah', 100);
            $table->string('nama_matakuliah', 100);
            $table->integer('sks');
            $table->integer('id_semester');
            $table->integer('id_prodi');
            $table->integer('id_kelas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
