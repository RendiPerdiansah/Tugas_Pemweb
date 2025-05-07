<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Dosen;
use App\Models\M_Jurusan;
use App\Models\M_Prodi;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

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
        $jurusan = M_Jurusan::all();
        $prodi = M_Prodi::all();
        return view('v_adddosen', compact('jurusan', 'prodi'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:tb_dosen,nip',
            'nama_dosen' => 'required',
            'jk_dosen' => 'required',
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'foto_dosen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Generate new id_dosen
        $maxIdNumber = $this->dosen->getMaxIdDosenNumber();
        $newIdNumber = $maxIdNumber + 1;
        $newIdDosen = 'DSN' . str_pad($newIdNumber, 5, '0', STR_PAD_LEFT);

        // Upload foto
        $file = $request->file('foto_dosen');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto_dosen'), $filename);

        $data = [
            'id_dosen' => $newIdDosen,
            'nip' => $request->nip,
            'nama_dosen' => $request->nama_dosen,
            'jk_dosen' => $request->jk_dosen,
            'id_jurusan' => $request->id_jurusan,
            'id_prodi' => $request->id_prodi,
            'foto_dosen' => $filename,
        ];

        $this->dosen->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan!');
    }

    public function edit($nip)
    {
        $dosen = $this->dosen->detailData($nip);
        $jurusan = M_Jurusan::all();
        $prodi = M_Prodi::all();
        return view('v_editdosen', compact('dosen', 'jurusan', 'prodi'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama_dosen' => 'required',
            'jk_dosen' => 'required',
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'foto_dosen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dosen = $this->dosen->detailData($nip);

        if (!$dosen) {
            return redirect()->route('dosen')->with('error', 'Data dosen tidak ditemukan.');
        }

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
            'jk_dosen' => $request->jk_dosen,
            'id_jurusan' => $request->id_jurusan,
            'id_prodi' => $request->id_prodi,
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

    public function print()
    {
        $dosen = $this->dosen->allData();
        $pdf = Pdf::loadView('v_dosen_print', compact('dosen'));
        return $pdf->stream('dosen.pdf');
    }
}
