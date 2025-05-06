<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            $table->string('nip', 16)->unique()->after('nidn');
            $table->string('id_dosen', 8)->unique()->after('nip');
        });
    }

    public function down(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            $table->dropColumn(['nip', 'id_dosen']);
        });
    }
};
