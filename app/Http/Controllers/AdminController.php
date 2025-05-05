<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

class AdminController extends Controller
{
    public function index() {
        $labels = ['TI', 'SI', 'MI'];
        $data = [
            Mahasiswa::where('jurusan', 'TI')->count(),
            Mahasiswa::where('jurusan', 'SI')->count(),
            Mahasiswa::where('jurusan', 'MI')->count(),
        ];
        return view('admin.v_admin', compact('labels', 'data'));
    }
}