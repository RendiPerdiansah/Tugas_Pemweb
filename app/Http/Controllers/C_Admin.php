<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_Dosen;

class C_Admin extends Controller
{
    protected $M_Dosen;

    public function __construct()
    {
        $this->M_Dosen = new M_Dosen();
    }

    public function index()
    {
        return view('admin.v_index');
    }

    public function data_dosen()
    {
        $data = ['dosen' => $this->M_Dosen->allData2()];
        return view ('v_dosen4', $data);
    }
    
    public function detail($nidn)
    {
        if(!$this->M_Dosen->detailData($nidn)){
            abort(404);
        }
        $data = ['dosen' => $this->M_Dosen->detailData($nidn)];
        return view ('v_detaildosen4', $data);
    }

    public function add()
    {
        $data = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view ('v_adddosen', $data);
    }

    public function insert()
    {
       request()->validate([
            'nidn' => 'required|unique:tb_dosen,nidn',
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'foto_dosen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ],[
            'nidn.required' => 'NIDN tidak boleh kosong',
            'nidn.unique' => 'NIDN ini sudah terdaftar di database !',
            'nidn.min' => 'NIDN minimal 10 karakter',
            'nidn.max' => 'NIDN maksimal 10 karakter',
            'nama_dosen.required' => 'Nama Dosen wajib diisi !',
            'bidang_keahlian.required' => 'Bidang Keahlian wajib diisi !',
            'id_prodi.required' => 'Program studi wajib diisi !',
            'id_jurusan.required' => 'Jurusan wajib diisi !',
            'foto_dosen.required' => 'Foto Dosen wajib diisi !',
        ]);

        $file = Request()->file('foto_dosen');
        $filename = Request()->nidn . '.' . $file->extension();
        $file->move(public_path('foto_dosen'), $filename);

        $data = [
            'nidn' => Request()->nidn,
            'nama_dosen' => Request()->nama_dosen,
            'bidang_keahlian' => Request()->bidang_keahlian,
            'id_jurusan' => Request()->id_jurusan,
            'id_prodi' => Request()->id_prodi,
            'foto_dosen' => $filename,
        ];
        $this->M_Dosen->addData($data);
        return redirect()->route('data_dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit($nidn)
    {
        if(!$this->M_Dosen->detailData($nidn)){
            abort(404);
        }
        $data = [
            'dosen' => $this->M_Dosen->detailData($nidn),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view ('v_editdosen', $data);
    }

    public function update($nidn)
    {
        if (Request()->foto_dosen <> "") {
            $file = Request()->foto_dosen;
            $fileName = Request()->nidn . '.' . $file->extension();
            $file->move(public_path('foto_dosen'), $fileName);

            $data = [
                'nidn' => Request()->nidn,
                'nama_dosen' => Request()->nama_dosen,
                'bidang_keahlian' => Request()->bidang_keahlian,
                'id_jurusan' => Request()->id_jurusan,
                'id_prodi' => Request()->id_prodi,
                'foto_dosen' => $fileName,
            ];
        } else {
            $data = [
                'nidn' => Request()->nidn,
                'nama_dosen' => Request()->nama_dosen,
                'bidang_keahlian' => Request()->bidang_keahlian,
                'id_jurusan' => Request()->id_jurusan,
                'id_prodi' => Request()->id_prodi,
            ];
        }
        $this->M_Dosen->editData($nidn, $data);
        return redirect()->route('data_dosen')->with('pesan', 'Data berhasil diupdate !');
    }

    public function delete($nidn)
    {
        $this->M_Dosen->deleteData($nidn);
        return redirect()->route('data_dosen')->with('pesan', 'Data berhasil dihapus !');
    }
}
