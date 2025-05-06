<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->integer('id_kelas')->primary();
            $table->string('nama_kelas', 100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};