<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 20);
            $table->text('alamat')->nullable();
            $table->date('tgl_lahir');
            $table->unsignedInteger('id_prodi');
            $table->unsignedInteger('id_jurusan');
        });

        Schema::create('tb_dosen', function (Blueprint $table) {
            $table->string('nidn', 20)->primary();
            $table->string('nama_dosen', 200);
            $table->unsignedInteger('id_matakuliah');
            $table->string('foto_dosen', 200)->nullable();
            $table->unsignedInteger('id_prodi');
            $table->unsignedInteger('id_jurusan');
        });

        Schema::create('jurusan', function (Blueprint $table) {
            $table->id('id_jurusan');
            $table->string('nama_jurusan', 200);
        });

        Schema::create('prodi', function (Blueprint $table) {
            $table->id('id_prodi');
            $table->string('nama_prodi', 100);
            $table->string('jenjang', 20);
            $table->unsignedInteger('id_jurusan');
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas', 100);
        });

        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->id('id_matakuliah');
            $table->string('kode_matakuliah', 100);
            $table->string('nama_matakuliah', 200);
            $table->integer('sks');
            $table->unsignedInteger('id_semester');
            $table->unsignedInteger('id_kelas');
            $table->unsignedInteger('id_prodi');
        });

        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->string('nidn', 20);
            $table->unsignedInteger('id_matakuliah');
            $table->unsignedInteger('id_semester');
            $table->unsignedInteger('id_tahun_akademik');
            $table->unsignedInteger('id_prodi');
            $table->unsignedInteger('id_jurusan');
            $table->string('komposisi_nilai_lain', 20);
            $table->string('komposisi_nilai_uts', 20);
            $table->string('komposisi_nilai_uas', 20);
        });
        
        Schema::create('detail_nilai', function (Blueprint $table) {
            $table->string('nim', 20);
            $table->unsignedInteger('lain_lain')->nullable();
            $table->unsignedInteger('uts');
            $table->unsignedInteger('uas');
            $table->unsignedInteger('nilai_akhir');
            $table->string('grade', 30);
            $table->unsignedInteger('id_nilai');
        });
        
        Schema::create('semester', function (Blueprint $table) {
            $table->id('id_semester');
            $table->integer('semester');
        });
        
        Schema::create('tahun_akademik', function (Blueprint $table) {
            $table->id('id_tahun_akademik');
            $table->string('tahun_akademik', 30);
        });
        
        
        
        
    }

    public function down()
    {
        Schema::dropIfExists('detail_nilai');
        Schema::dropIfExists('nilai');
        Schema::dropIfExists('mata_kuliah');
        Schema::dropIfExists('tb_dosen');
        Schema::dropIfExists('tb_mahasiswa');
        Schema::dropIfExists('semester');
        Schema::dropIfExists('tahun_akademik');
        Schema::dropIfExists('kelas');
        Schema::dropIfExists('prodi');
        Schema::dropIfExists('jurusan');
    }
    
}
