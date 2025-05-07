<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Prodi extends Model
{
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_prodi', 'id_jurusan'];

    public function jurusan()
    {
        return $this->belongsTo(M_Jurusan::class, 'id_jurusan');
    }
}
