<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Mahasiswa extends Model
{
    public function alldata()
    {
        return DB::table('tb_mahasiswa')->get();
    }

    public function detaildata($id_mahasiswa)
    {
        return DB::table('tb_mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();
    }

    public function addData($data)
    {
        DB::table('tb_mahasiswa')->insert($data);
    }

    public function editData($id_mahasiswa, $data)
    {
        DB::table('tb_mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->update($data);
    }

    public function deleteData($id_mahasiswa)
    {
        DB::table('tb_mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->delete();
    } 
}
