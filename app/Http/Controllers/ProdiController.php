<?php

namespace App\Http\Controllers;

use App\Models\M_Prodi;
use App\Models\M_Jurusan;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $data = M_Prodi::with('jurusan')->get();
        return view('prodi.index', compact('data'));
    }

    public function create()
    {
        $jurusan = M_Jurusan::all();
        return view('prodi.create', compact('jurusan'));
    }

    public function store(Request $request)
    {
        M_Prodi::create($request->all());
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $prodi = M_Prodi::findOrFail($id);
        $jurusan = M_Jurusan::all();
        return view('prodi.edit', compact('prodi', 'jurusan'));
    }

    public function update(Request $request, $id)
    {
        $prodi = M_Prodi::findOrFail($id);
        $prodi->update($request->all());
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil diupdate.');
    }

    public function destroy($id)
    {
        M_Prodi::destroy($id);
        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil dihapus.');
    }
}

