<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_Nilai;

class C_Nilai extends Controller
{
    protected $M_Nilai;

    public function __construct()
    {
        $this->M_Nilai = new M_Nilai();
    }

    public function index()
    {
        $data = ['nilai' => $this->M_Nilai->allData()];
        return view('v_datanilai', $data);
    }

    public function add()
    {
        $data = [
            'dosen' => DB::table('tb_dosen')->get(),
            'mata_kuliah' => DB::table('mata_kuliah')->select('id_matakuliah', 'nama_matakuliah')->get(),
            'semester' => DB::table('semester')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('v_adddatanilai', $data);
    }

    private function generateIdNilai()
    {
        $last = DB::table('nilai')->orderBy('id_nilai', 'desc')->first();
        if (!$last) {
            return 'NIL001';
        }
        $lastNumber = intval(substr($last->id_nilai, 3));
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        return 'NIL' . $newNumber;
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ]);

        $idNilai = $this->generateIdNilai();

        $data = [
            'id_nilai' => $idNilai,
            'nidn' => $request->nidn,
            'id_matakuliah' => $request->id_matakuliah,
            'id_tahun_akademik' => $request->id_tahun_akademik,
            'komposisi_nilai_lain' => $request->komposisi_nilai_lain,
            'komposisi_nilai_uts' => $request->komposisi_nilai_uts,
            'komposisi_nilai_uas' => $request->komposisi_nilai_uas,
        ];

        $this->M_Nilai->addData($data);

        return redirect()->route('nilai.index')->with('pesan', 'Data nilai berhasil ditambahkan!');
    }

    public function edit($id_nilai)
    {
        $nilai = $this->M_Nilai->detailData($id_nilai);
        if (!$nilai) {
            abort(404);
        }
        $data = [
            'nilai' => $nilai,
            'dosen' => DB::table('tb_dosen')->get(),
            'mata_kuliah' => DB::table('mata_kuliah')->get(),
            'semester' => DB::table('semester')->get(),
            'tahun_akademik' => DB::table('tahun_akademik')->get(),
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('v_editnilai', $data);
    }

    public function update(Request $request, $id_nilai)
    {
        $request->validate([
            'nidn' => 'required',
            'id_matakuliah' => 'required',
            'id_tahun_akademik' => 'required',
            'komposisi_nilai_lain' => 'required|numeric',
            'komposisi_nilai_uts' => 'required|numeric',
            'komposisi_nilai_uas' => 'required|numeric',
        ]);

        $data = [
            'nidn' => $request->nidn,
            'id_matakuliah' => $request->id_matakuliah,
            'id_tahun_akademik' => $request->id_tahun_akademik,
            'komposisi_nilai_lain' => $request->komposisi_nilai_lain,
            'komposisi_nilai_uts' => $request->komposisi_nilai_uts,
            'komposisi_nilai_uas' => $request->komposisi_nilai_uas,
        ];

        $this->M_Nilai->editData($id_nilai, $data);

        return redirect()->route('nilai.index')->with('pesan', 'Data nilai berhasil diupdate!');
    }

    public function delete($id_nilai)
    {
        $this->M_Nilai->deleteData($id_nilai);

        return redirect()->route('nilai.index')->with('pesan', 'Data nilai berhasil dihapus!');
    }

    public function detail($id_nilai)
    {
        $nilai = $this->M_Nilai->detailData($id_nilai);
        if (!$nilai) {
            abort(404);
        }
        $detailMahasiswa = $this->M_Nilai->getDetailNilaiStudents($id_nilai);
        return view('v_rinciannilai', ['nilai' => $nilai, 'detailMahasiswa' => $detailMahasiswa]);
    }
}
