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
        Schema::create('tb_dosen', function (Blueprint $table) {
            $table->string('nidn', 20)->primary();
            $table->string('nama_dosen', 100);
            $table->text('bidang_keahlian')->nullable();
            $table->integer('id_jurusan');
            $table->integer('id_prodi');
            $table->string('foto_dosen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dosen');
    }
};
