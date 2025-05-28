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
        Schema::create('nilai', function (Blueprint $table) {
            $table->string('id_nilai', 30)->primary();
            $table->string('nidn', 20);
            $table->integer('id_matakuliah');
            $table->integer('id_tahun_akademik');
            $table->string('komposisi_nilai_uts');
            $table->string('komposisi_nilai_uas');
            $table->string('komposisi_nilai_lain');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
