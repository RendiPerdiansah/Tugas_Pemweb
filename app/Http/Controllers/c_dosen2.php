<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\M_Dosen;

    class c_dosen extends Controller
    {
        public function __construct()
        {
            $this->M_Dosen = new M_Dosen();
        }

        public function index()
        {
        $data = [
            'dosen' => $this->M_Dosen->alldata(),
        ];
        
        return view('v_dosen', $data);
        }
    }