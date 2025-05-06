<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 10);
            $table->date('tgl_lahir');
            $table->integer('id_jurusan');
            $table->integer('id_prodi');
            $table->string('alamat', 255);
            $table->string('agama', 50);
            $table->integer('tingkat');
            $table->integer('semester');
            $table->string('nomor_handphone', 20);
            $table->string('foto_mahasiswa')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tb_mahasiswa');
    }
};