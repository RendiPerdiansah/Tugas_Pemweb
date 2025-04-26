<?php

namespace App\Http\Controllers;

use App\Models\M_Mahasiswa;
use Illuminate\Http\Request;

class c_mahasiswa extends Controller
{

  public function __construct()
  {
    $this->M_Mahasiswa = new M_Mahasiswa();
  }

  public function index()
  {
    $data = [
      'mahasiswa' => $this->M_Mahasiswa->alldata(),
    ];
    return view('v_mahasiswa', $data);
  }

  public function detail($id_mahasiswa)
  {
    if (!$this->M_Mahasiswa->detaildata($id_mahasiswa)) {
      abort(404);
    }
    $data = [
      'mahasiswa' => $this->M_Mahasiswa->detaildata($id_mahasiswa),
    ];
    return view('v_mahasiswa2', $data);
  }


  public function add()
  {
    return view('v_addmahasiswa');
  }

  public function insert()
  {
    Request()->validate([
      'nim' => 'required|unique:tb_mahasiswa,nim|min:17|max:18',
      'nama' => 'required',
      'jurusan' => 'required',
      'prodi' => 'required',
      'ttl' => 'required',
      'alamat' => 'required',
      'agama' => 'required',
      'tingkat' => 'required',
      'semester' => 'required',
      'no_hp' => 'required',
      'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
    ], [ //ini adalah konversi keterangan validasi form NIM dalam bahasa indonesia
      'nim.required' => 'NIM wajib diisi !',
      'nim.unique' => 'NIM ini sudah terdaftar di database !',
      'nim.min' => 'NIM minimal 17 karakter',
      'nim.max' => 'NIM maksimal 18 karakter',
      'nama.required' => 'Nama Mahasiswa wajib di isi !',
      'jurusan.required' => 'Jurusan wajib di isi !',
      'prodi.required' => 'Prodi wajib di isi !',
      'ttl.required' => 'Tempat Tanggal Lahir wajib di isi !',
      'alamat.required' => 'Alamat wajib di isi !',
      'agama.required' => 'Agama wajib di isi !',
      'tingkat.required' => 'Tingkat wajib di isi !',
      'semester.required' => 'Semester wajib di isi !',
      'no_hp.required' => 'No HP wajib di isi !',
      'foto_mahasiswa.required' => 'Foto Mahasiswa wajib di isi !',
    ]);
    //jika validasi tidak ada maka lakukan simpan data
    //upload gambar/foto
    $file = Request()->foto_mahasiswa;
    $fileName = Request()->nim . '.' . $file->extension();
    $file->move(public_path('foto_mahasiswa'), $fileName);

    $data = [
      'nim' => Request()->nim,
      'nama' => Request()->nama,
      'jurusan' => Request()->jurusan,
      'prodi' => Request()->prodi,
      'ttl' => Request()->ttl,
      'alamat' => Request()->alamat,
      'agama' => Request()->agama,
      'tingkat' => Request()->tingkat,
      'semester' => Request()->semester,
      'no_hp' => Request()->no_hp,
      'foto_mahasiswa' => $fileName,
    ];
    $this->M_Mahasiswa->addData($data);
    return Redirect()->route('mahasiswa')->with('pesan', 'Data Berhasil Ditambahkan !');
  }

  public function edit($id_mahasiswa)
  {
    if (!$this->M_Mahasiswa->detaildata($id_mahasiswa)) {
      abort(404);
    }
    $data = [
      'mahasiswa' => $this->M_Mahasiswa->detaildata($id_mahasiswa),
    ];
    return view('v_editmahasiswa', $data);
  }

  public function update($id_mahasiswa)
  {
    Request()->validate([
      'nim' => 'required|min:17|max:18',
      'nama' => 'required',
      'jurusan' => 'required',
      'prodi' => 'required',
      'ttl' => 'required',
      'alamat' => 'required',
      'agama' => 'required',
      'tingkat' => 'required',
      'semester' => 'required',
      'no_hp' => 'required',
      'foto_mahasiswa' => 'mimes:jpg,jpeg,png,bmp|max:1024',
    ], [ //ini adalah konversi keterangan validasi form NIM dalam bahasa indonesia
      'nim.required' => 'NIM wajib diisi !',
      'nim.min' => 'NIM minimal 17 karakter',
      'nim.max' => 'NIM maksimal 18 karakter',
      'nama.required' => 'Nama Mahasiswa wajib di isi !',
      'jurusan.required' => 'Jurusan wajib di isi !',
      'prodi.required' => 'Prodi wajib di isi !',
      'ttl.required' => 'Tempat Tanggal Lahir wajib di isi !',
      'alamat.required' => 'Alamat wajib di isi !',
      'agama.required' => 'Agama wajib di isi !',
      'tingkat.required' => 'Tingkat wajib di isi !',
      'semester.required' => 'Semester wajib di isi !',
      'no_hp.required' => 'No HP wajib di isi !',
    ]);
    //jika validasi tidak ada maka lakukan simpan data
    if (Request()->foto_mahasiswa <> "") {
      //jika ganti gambar/foto
      $file = Request()->foto_mahasiswa;
      $fileName = Request()->nim . '.' . $file->extension();
      $file->move(public_path('foto_mahasiswa'), $fileName);

      $data = [
        'nim' => Request()->nim,
        'nama' => Request()->nama,
        'jurusan' => Request()->jurusan,
        'prodi' => Request()->prodi,
        'ttl' => Request()->ttl,
        'alamat' => Request()->alamat,
        'agama' => Request()->agama,
        'tingkat' => Request()->tingkat,
        'semester' => Request()->semester,
        'no_hp' => Request()->no_hp,
        'foto_mahasiswa' => $fileName,
      ];
      $this->M_Mahasiswa->editData($id_mahasiswa, $data);
    } else {
      //jika tidak ganti gambar/foto
      $data = [
        'nim' => Request()->nim,
        'nama' => Request()->nama,
        'jurusan' => Request()->jurusan,
        'prodi' => Request()->prodi,
        'ttl' => Request()->ttl,
        'alamat' => Request()->alamat,
        'agama' => Request()->agama,
        'tingkat' => Request()->tingkat,
        'semester' => Request()->semester,
        'no_hp' => Request()->no_hp,
      ];
      $this->M_Mahasiswa->editData($id_mahasiswa, $data);
    }
    return redirect()->route('mahasiswa')->with('pesan', 'Data Berhasil Diubah !');
  }

  public function delete($id_mahasiswa)
  {
    //hapus atau delete foto
    $mahasiswa = $this->M_Mahasiswa->detaildata($id_mahasiswa);
    if ($mahasiswa->foto_mahasiswa <> "") {
      unlink(public_path('foto_mahasiswa') . '/' . $mahasiswa->foto_mahasiswa);
    }
    $this->M_Mahasiswa->deleteData($id_mahasiswa);
    return redirect()->route('mahasiswa')->with('pesan', 'Data Berhasil Dihapus !');
  }
}
