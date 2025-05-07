<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Dosen;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class c_dosen extends Controller
{
    protected $dosen;

    public function __construct(M_Dosen $dosen)
    {
        $this->dosen = $dosen;
    }

    public function index()
    {
        $data = ['dosen' => $this->dosen->allData()];
        return view('v_dosen', $data);
    }

    public function detail($nip)
    {
        $data = ['dosen' => $this->dosen->detailData($nip)];
        return view('v_dosen2', $data);
    }

    public function add()
    {
        return view('v_adddosen');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosen,nip',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload foto
        $file = $request->file('foto_dosen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto_dosen'), $filename);

        $data = [
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
            'foto_dosen' => $filename,
        ];

        $this->dosen->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($nip)
    {
        $data = ['dosen' => $this->dosen->detailData($nip)];
        return view('v_editdosen', $data);
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dosen = $this->dosen->detailData($nip);

        // Update foto jika ada file baru
        if ($request->hasFile('foto_dosen')) {
            if (File::exists(public_path('foto_dosen/' . $dosen->foto_dosen))) {
                File::delete(public_path('foto_dosen/' . $dosen->foto_dosen));
            }

            $file = $request->file('foto_dosen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_dosen'), $filename);
        } else {
            $filename = $dosen->foto_dosen;
        }

        $data = [
            'nama_dosen' => $request->nama_dosen,
            'mata_kuliah' => $request->mata_kuliah,
            'foto_dosen' => $filename,
        ];

        $this->dosen->editData($nip, $data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil diupdate!');
    }

    public function delete($nip)
    {
        $dosen = $this->dosen->detailData($nip);
        if (File::exists(public_path('foto_dosen/' . $dosen->foto_dosen))) {
            File::delete(public_path('foto_dosen/' . $dosen->foto_dosen));
        }

        $this->dosen->deleteData($nip);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus!');
    }
}
