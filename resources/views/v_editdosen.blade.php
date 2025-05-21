@extends('layout.v_tamplate')

@section('Title')
    Dosen
@endsection

@section('page')
    Edit Data Dosen
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left column -->
        <div class="col-md-6">
            <!-- Edit form -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Dosen</h3>
                </div>

                <form action="/datadosen/update/{{ $dosen->nidn }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nidn">NIDN</label>
                            <input type="text" name="nidn" class="form-control" id="nidn" placeholder="Masukkan NIDN" value="{{ $dosen->nidn }}" readonly>
                            <div class="text-danger">
                                @error('nidn') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukkan Nama Dosen" value="{{ $dosen->nama_dosen }}">
                            <div class="text-danger">
                                @error('nama_dosen') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bidang_keahlian">Bidang Keahlian</label>
                            <input type="text" name="bidang_keahlian" class="form-control" id="bidang_keahlian" placeholder="Masukkan Bidang Keahlian" value="{{ $dosen->bidang_keahlian }}">
                            <div class="text-danger">
                                @error('bidang_keahlian') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_jurusan">Jurusan</label>
                            <select name="id_jurusan" id="id_jurusan" class="form-control">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}" {{ $dosen->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_jurusan') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_prodi">Program Studi</label>
                            <select name="id_prodi" id="id_prodi" class="form-control">
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id_prodi }}" {{ $dosen->id_prodi == $p->id_prodi ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_prodi') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto_dosen">Foto Dosen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_dosen" class="custom-file-input" id="foto_dosen">
                                    <label class="custom-file-label" for="foto_dosen">Pilih file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="text-danger mt-1">
                                @error('foto_dosen') {{ $message }} @enderror
                            </div>
                            @if($dosen->foto_dosen)
                                <div class="mt-2">
                                    <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="100px" alt="Foto Dosen">
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
