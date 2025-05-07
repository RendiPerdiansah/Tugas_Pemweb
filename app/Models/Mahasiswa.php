<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa'; 
    protected $primaryKey = 'nim'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 
    public $timestamps = false;

    public function allData()
    {
        return DB::table($this->table)
            ->leftJoin('jurusan', 'tb_mahasiswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->leftJoin('prodi', 'tb_mahasiswa.id_prodi', '=', 'prodi.id_prodi')
            ->select(
                'tb_mahasiswa.*',
                'jurusan.nama_jurusan as jurusan',
                'prodi.nama_prodi as prodi'
            )
            ->get();
    }

    public function detailsData($nim)
    {
        return DB::table($this->table)
            ->leftJoin('jurusan', 'tb_mahasiswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->leftJoin('prodi', 'tb_mahasiswa.id_prodi', '=', 'prodi.id_prodi')
            ->select(
                'tb_mahasiswa.*',
                'jurusan.nama_jurusan as jurusan',
                'prodi.nama_prodi as prodi'
            )
            ->where('tb_mahasiswa.nim', $nim)
            ->first();
    }

    public function addData($data)
    {
        DB::table('tb_mahasiswa')->insert($data);
    }

    public function editData($nim, $data)
    {
        DB::table('tb_mahasiswa')->where('nim', $nim)->update($data);
    }

    public function deleteData($nim)
    {
        DB::table('tb_mahasiswa')->where('nim', $nim)->delete();
    }
}
