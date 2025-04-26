<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_Dosen extends Model
{
    public function alldata()
    {
        return DB::table('tb_dosen')->get();
    }

    public function detaildata($id_dosen)
    {
        return DB::table('tb_dosen')->where('id_dosen', $id_dosen)->first();
    }

    public function addData($data)
    {
        DB::table('tb_dosen')->insert($data);
    }

    public function editData($id_dosen, $data)
    {
        DB::table('tb_dosen')->where('id_dosen', $id_dosen)->update($data);
    }

    public function deleteData($id_dosen)
    {
        DB::table('tb_dosen')->where('id_dosen', $id_dosen)->delete();
    } 
}
