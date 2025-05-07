<?php
namespace App\Http\Controllers;

use App\Models\M_Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    protected $dosen;

    public function __construct(M_Dosen $dosen)
    {
        $this->dosen = $dosen;
    }

    public function index()
    {
        $dosen = $this->dosen->allData();
        return view('v_dosen', compact('dosen'));
    }

    public function create()
    {
        return view('v_adddosen');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->dosen->addData($data);
        return redirect()->route('dosen')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function show($nip)
    {
        $data = $this->dosen->detailData($nip);
        return view('v_dosen2', compact('data'));
    }

    public function edit($nip)
    {
        $data = $this->dosen->detailData($nip);
        return view('v_editdosen', compact('data'));
    }

    public function update(Request $request, $nip)
    {
        $this->dosen->editData($nip, $request->all());
        return redirect()->route('dosen')->with('success', 'Data dosen berhasil diupdate.');
    }

    public function destroy($nip)
    {
        $this->dosen->deleteData($nip);
        return redirect()->route('dosen')->with('success', 'Data dosen berhasil dihapus.');
    }
}

