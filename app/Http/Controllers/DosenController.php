<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Mahasiswa;

class DosenController extends Controller
{
    public function index() {
        $data = Mahasiswa::all();
        return view('dosen.index', compact('data'));
    }

    // public function print() {
    //     $data = Mahasiswa::all();
    //     $pdf = PDF::loadView('dosen.print', compact('data'));
    //     return $pdf->download('mahasiswa.pdf');
    // }
}
