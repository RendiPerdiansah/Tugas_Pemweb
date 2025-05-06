<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            if (!Schema::hasColumn('tb_dosen', 'nip')) {
                $table->string('nip', 16)->unique()->after('nidn');
            }
            if (!Schema::hasColumn('tb_dosen', 'id_dosen')) {
                $table->string('id_dosen', 8)->unique()->after('nip');
            }
            if (!Schema::hasColumn('tb_dosen', 'foto_dosen')) {
                $table->string('foto_dosen')->nullable()->after('id_prodi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tb_dosen', function (Blueprint $table) {
            if (Schema::hasColumn('tb_dosen', 'nip')) {
                $table->dropColumn('nip');
            }
            if (Schema::hasColumn('tb_dosen', 'id_dosen')) {
                $table->dropColumn('id_dosen');
            }
            if (Schema::hasColumn('tb_dosen', 'foto_dosen')) {
                $table->dropColumn('foto_dosen');
            }
        });
    }
};
