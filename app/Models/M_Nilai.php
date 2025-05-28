<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    public $incrementing = true;
    protected $keyType = 'int';

    // Ambil semua data nilai dengan join ke tabel terkait
    public function allData()
    {
        return DB::table($this->table)
            ->leftJoin('tb_dosen', 'nilai.nidn', '=', 'tb_dosen.nidn')
            ->leftJoin('mata_kuliah', 'nilai.id_matakuliah', '=', 'mata_kuliah.id_matakuliah')
            ->leftJoin('tahun_akademik', 'nilai.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
            ->select(
                'nilai.*',
                'tb_dosen.nama_dosen',
                'mata_kuliah.nama_matakuliah',
                'tahun_akademik.tahun_akademik'
            )
            ->get();
    }

    // Ambil data detail berdasarkan id_nilai
    public function detailData($id_nilai)
    {
        return DB::table($this->table)
            ->leftJoin('tb_dosen', 'nilai.nidn', '=', 'tb_dosen.nidn')
            ->leftJoin('mata_kuliah', 'nilai.id_matakuliah', '=', 'mata_kuliah.id_matakuliah')
            ->leftJoin('tahun_akademik', 'nilai.id_tahun_akademik', '=', 'tahun_akademik.id_tahun_akademik')
            ->select(
                'nilai.*',
                'tb_dosen.nama_dosen',
                'mata_kuliah.nama_matakuliah',
                'tahun_akademik.tahun_akademik'
            )
            ->where('id_nilai', $id_nilai)
            ->first();
    }

    // Tambah data
    public function addData($data)
    {
        DB::table($this->table)->insert($data);
    }

    // Edit data
    public function editData($id_nilai, $data)
    {
        DB::table($this->table)->where('id_nilai', $id_nilai)->update($data);
    }

    // Hapus data
    public function deleteData($id_nilai)
    {
        DB::table($this->table)->where('id_nilai', $id_nilai)->delete();
    }

    public function getDetailNilaiStudents($id_nilai)
    {
        return DB::table('detail_nilai')
            ->join('tb_mahasiswa', 'detail_nilai.nim', '=', 'tb_mahasiswa.nim')
            ->select(
                'detail_nilai.id_detail_nilai as id_detail_nilai',
                'tb_mahasiswa.nim',
                'tb_mahasiswa.nama',
                'detail_nilai.uts as nilai_uts',
                'detail_nilai.uas as nilai_uas',
                'detail_nilai.tugas as nilai_tugas',
                'detail_nilai.nilai_akhir'
            )
            ->where('detail_nilai.id_nilai', $id_nilai)
            ->get();
    }
}
