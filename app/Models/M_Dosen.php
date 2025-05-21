<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Dosen extends Model
{
    use HasFactory;

    protected $table = 'tb_dosen';
    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';

    // Ambil semua data dosen
    public function allData()
    {
        return DB::table($this->table)
            ->leftJoin('jurusan', 'tb_dosen.id_jurusan', '=', 'jurusan.id_jurusan')
            ->leftJoin('prodi', 'tb_dosen.id_prodi', '=', 'prodi.id_prodi')
            ->select(
                'tb_dosen.*',
                'jurusan.nama_jurusan as nama_jurusan',
                'prodi.nama_prodi as nama_prodi'
            )
            ->get();
    }

    // Ambil data detail berdasarkan NIP
    public function detailData($nidn)
    {
        return DB::table('tb_dosen as a')
            ->leftJoin('jurusan as d', 'a.id_jurusan', '=', 'd.id_jurusan')
            ->leftJoin('prodi as c', 'a.id_prodi', '=', 'c.id_prodi')
            ->select(
                'a.*',
                'd.nama_jurusan as nama_jurusan',
                'c.nama_prodi as nama_prodi'
            )
            ->where('a.nidn', $nidn)
            ->first();
    }

    // Tambah data
    public function addData($data)
    {
        DB::table('tb_dosen')->insert($data);
    }

    // Edit data
    public function editData($nidn, $data)
    {
        DB::table('tb_dosen')->where('nidn', $nidn)->update($data);
    }

    // Hapus data
    public function deleteData($nidn)
    {
        DB::table('tb_dosen')->where('nidn', $nidn)->delete();
    }

    // // Optional: Ambil ID max jika pakai id_dosen otomatis
    // public function getMaxIdDosenNumber()
    // {
    //     $max = DB::table($this->table)
    //         ->select(DB::raw('MAX(CAST(SUBSTRING(id_dosen, 4) AS UNSIGNED)) as max_number'))
    //         ->first();

    //     return $max->max_number ?? 0;
    // }

    public function alldata2(){
        //return DB::table('tb_dosen')->get();

        $data = DB::select(
            'select a.nidn as nidn, a.nama_dosen as nama_dosen, a.foto_dosen as foto_dosen, a.bidang_keahlian as bidang_keahlian, a.id_prodi as id_prodi, c.nama_prodi as nama_prodi, a.id_jurusan as id_jurusan, d.nama_jurusan as nama_jurusan from tb_dosen as a, prodi as c, jurusan as d where a.id_prodi = c.id_prodi and a.id_jurusan = d.id_jurusan order by a.nama_dosen asc'
        );
        return $data;
    }

    public function alldata3() {
        //elequent
        //$data = DB::table('tb_dosen')
        //join('mata_kuliah', 'tb_dosen.id_matakuliah', '=', 'mata_kuliah.id_matakuliah)
        //->join('prodi', 'tb_dosen.id_prodi', '=', 'prodi.id_prodi')
        //->join('jurusan', 'tb_dosen.id_jurusan', '=', 'jurusan.id_jurusan')
        //->select('mata_kuliah.*', 'prodi.nama_prodi', 'jurusan.nama_jurusan')
        //->get();

        return DB::table('mata_kuliiah')->get();
    }
    
}
