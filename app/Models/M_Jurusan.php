<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama_jurusan'];
}
