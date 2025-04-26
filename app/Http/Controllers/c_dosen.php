<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\M_Dosen;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

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
         return view('v_dosen',$data);
        }

    public function detail($id_dosen)
    {
       if(!$this->M_Dosen->detaildata($id_dosen)){
           abort(404);
       }
         $data = [
              'dosen' => $this->M_Dosen->detaildata($id_dosen),
         ];
            return view('v_dosen2', $data);
    }

    public function add()
    {
        return view('v_adddosen');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tb_dosen,nip|min:17|max:18',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'nip.required' => 'NIP wajib diisi !',
            'nip.unique' => 'NIP ini sudah terdaftar di database !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen wajib di isi !',
            'mata_kuliah.required' => 'Mata Kuliah wajib di isi !',
            'foto_dosen.required' => 'Foto Dosen wajib di isi !',
        ]);
        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto
        $file = Request()->foto_dosen;
        $fileName = Request()->nip.'.'.$file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'mata_kuliah' => Request()->mata_kuliah,
            'foto_dosen' => $fileName,
        ];
        $this->M_Dosen->addData($data);
        Return Redirect()->route('dosen')->with('pesan','Data Berhasil Ditambahkan !');
    }

    public function edit($id_dosen)
    {
        if(!$this->M_Dosen->detaildata($id_dosen)){
            abort(404);
        }
        $data = [
            'dosen' => $this->M_Dosen->detaildata($id_dosen),
        ];
        return view('v_editdosen', $data);
    }

    public function update($id_dosen)
    {
        Request()->validate([
            'nip' => 'required|min:17|max:18',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ],[//ini adalah konversi keterangan validasi form NIP dalam bahasa indonesia
            'nip.required' => 'NIP wajib diisi !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen wajib di isi !',
            'mata_kuliah.required' => 'Mata Kuliah wajib di isi !',
        ]);
        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->foto_dosen <> "") {
            //jika ganti gambar/foto
            $file = Request()->foto_dosen;
            $fileName = Request()->nip.'.'.$file->extension();
            $file->move(public_path('foto_dosen'), $fileName);

            $data = [
                'nip' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'mata_kuliah' => Request()->mata_kuliah,
                'foto_dosen' => $fileName,
            ];
            $this->M_Dosen->editData($id_dosen, $data);
    }
        else {
            //jika tidak ganti gambar/foto
            $data = [
            'nip' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'mata_kuliah' => Request()->mata_kuliah, 
            ];
            $this->M_Dosen->editData($id_dosen, $data);
        }
        return redirect()->route('dosen')->with('pesan','Data Berhasil Diubah !');
    }

    public function delete($id_dosen)
    {
        //hapus atau delete foto
        $dosen = $this->M_Dosen->detaildata($id_dosen);
        if ($dosen->foto_dosen <> "") {
            unlink(public_path('foto_dosen').'/'.$dosen->foto_dosen);
        }
        $this->M_Dosen->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Dihapus !');
    }
}