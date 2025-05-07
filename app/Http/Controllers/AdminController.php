<?php

namespace App\Http\Controllers;

use App\Models\M_Mahasiswa;

class AdminController extends Controller
{
    public function index() {
        
        return view('admin.v_admin');
    }
}