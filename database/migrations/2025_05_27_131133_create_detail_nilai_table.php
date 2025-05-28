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
        Schema::create('detail_nilai', function (Blueprint $table) {
            $table->integer('id_detail_nilai')->primary();
            $table->string('id_nilai', 30);
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('tugas');
            $table->double('nilai_akhir');
            $table->string('grade', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_nilai');
    }
};
