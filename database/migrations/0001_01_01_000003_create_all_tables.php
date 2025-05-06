<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            $table->increments('id_jurusan');
            $table->string('nama_jurusan', 200);
        });

        Schema::create('prodi', function (Blueprint $table) {
            $table->increments('id_prodi');
            $table->string('nama_prodi');
            $table->string('jenjang', 10);
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
        });

        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->string('nama_kelas', 100);
        });

        Schema::create('tahun_akademik', function (Blueprint $table) {
            $table->increments('id_tahun_akademik');
            $table->string('tahun_akademik', 30);
        });

        Schema::create('semester', function (Blueprint $table) {
            $table->increments('id_semester');
            $table->integer('semester');
        });

        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->string('nim', 20)->primary();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 1);
            $table->date('tgl_lahir');
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
        });

        Schema::create('tb_dosen', function (Blueprint $table) {
            $table->string('nidn', 20)->primary();
            $table->string('nama_dosen', 100);
            $table->string('foto_dosen', 200);
            $table->integer('id_prodi')->unsigned();
            $table->integer('id_jurusan')->unsigned();
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
        });

        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->increments('id_matakuliah');
            $table->string('kode_matakuliah', 100);
            $table->string('nama_matakuliah', 200);
            $table->integer('sks');
            $table->integer('id_semester')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_prodi')->unsigned();
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
        });

        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->string('nidn', 30);
            $table->integer('id_matakuliah')->unsigned();
            $table->integer('id_semester')->unsigned();
            $table->integer('id_tahun_akademik')->unsigned();
            $table->integer('id_prodi')->unsigned();
            $table->integer('id_jurusan')->unsigned();
            $table->string('komposisi_nilai_tugas')->nullable();
            $table->string('komposisi_nilai_uts')->nullable();
            $table->string('komposisi_nilai_uas')->nullable();
            $table->foreign('nidn')->references('nidn')->on('tb_dosen');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('mata_kuliah');
            $table->foreign('id_semester')->references('id_semester')->on('semester');
            $table->foreign('id_tahun_akademik')->references('id_tahun_akademik')->on('tahun_akademik');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan');
        });

        Schema::create('detail_nilai', function (Blueprint $table) {
            $table->string('nim', 20);
            $table->integer('lain_lain')->nullable();
            $table->integer('uts')->nullable();
            $table->integer('uas')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->string('grade', 30)->nullable();
            $table->integer('id_nilai')->unsigned();
            $table->foreign('nim')->references('nim')->on('tb_mahasiswa');
            $table->foreign('id_nilai')->references('id_nilai')->on('nilai');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('level')->default(2); // contoh default level user biasa
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
