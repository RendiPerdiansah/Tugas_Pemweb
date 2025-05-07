<?php

namespace App\Http\Controllers;

use App\Models\M_Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    protected $mahasiswa;

    public function __construct(M_Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function index()
    {
        $data = $this->mahasiswa->allData();
        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $this->mahasiswa->addData($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function show($nim)
    {
        $data = $this->mahasiswa->detailsData($nim);
        return view('mahasiswa.show', compact('data'));
    }

    public function edit($nim)
    {
        $data = $this->mahasiswa->detailsData($nim);
        return view('mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $nim)
    {
        $this->mahasiswa->editData($nim, $request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate.');
    }

    public function destroy($nim)
    {
        $this->mahasiswa->deleteData($nim);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}

