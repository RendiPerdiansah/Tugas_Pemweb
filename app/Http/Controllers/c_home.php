<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_home extends Controller
{
    public function index()
    {
        $data = [
            'nama_pt' => 'Politeknik Negeri Subang',
            'alamat' => 'Jln Brigjen Katamso Dangdeur Subang',
        ];
        return view('v_home', $data);
    }

    public function about($id)
    {
        return 'ini halaman about dengan id :'.$id;
    }
}
