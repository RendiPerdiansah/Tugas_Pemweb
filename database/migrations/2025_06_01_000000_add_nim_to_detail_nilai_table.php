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
        Schema::table('detail_nilai', function (Blueprint $table) {
            $table->string('nim', 20)->after('id_nilai');
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_nilai', function (Blueprint $table) {
            $table->dropForeign(['nim']);
            $table->dropColumn('nim');
        });
    }
};
