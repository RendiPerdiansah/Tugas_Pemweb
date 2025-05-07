<?php

namespace App\Http\Controllers;

use App\Models\M_Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = M_Jurusan::all();
        return view('jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        M_Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jurusan = M_Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = M_Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diupdate.');
    }

    public function destroy($id)
    {
        M_Jurusan::destroy($id);
        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus.');
    }
}

