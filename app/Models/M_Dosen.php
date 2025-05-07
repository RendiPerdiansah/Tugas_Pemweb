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
    public function detailData($nip)
    {
        return DB::table($this->table)
            ->leftJoin('jurusan', 'tb_dosen.id_jurusan', '=', 'jurusan.id_jurusan')
            ->leftJoin('prodi', 'tb_dosen.id_prodi', '=', 'prodi.id_prodi')
            ->select(
                'tb_dosen.*',
                'jurusan.nama_jurusan as nama_jurusan',
                'prodi.nama_prodi as nama_prodi'
            )
            ->where('tb_dosen.nip', $nip)
            ->first();
    }

    // Tambah data
    public function addData($data)
    {
        DB::table($this->table)->insert($data);
    }

    // Edit data
    public function editData($nip, $data)
    {
        DB::table($this->table)->where('nip', $nip)->update($data);
    }

    // Hapus data
    public function deleteData($nip)
    {
        DB::table($this->table)->where('nip', $nip)->delete();
    }

    // Optional: Ambil ID max jika pakai id_dosen otomatis
    public function getMaxIdDosenNumber()
    {
        $max = DB::table($this->table)
            ->select(DB::raw('MAX(CAST(SUBSTRING(id_dosen, 4) AS UNSIGNED)) as max_number'))
            ->first();

        return $max->max_number ?? 0;
    }
}
