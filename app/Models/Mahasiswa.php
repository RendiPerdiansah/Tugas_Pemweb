<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $fillable = ['id', 'nama', 'id_jurusan'];
    public $incrementing = false;

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = 'MHS' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        });
    }
}
