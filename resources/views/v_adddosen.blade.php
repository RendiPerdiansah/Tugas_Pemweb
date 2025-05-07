@extends('layout.v_tamplate')

@section('Title')
    Dosen
@endsection

@section('page')
    Tambah Data Dosen
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">

            <!-- Form Tambah Dosen -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Dosen</h3>
                </div>

                <form action="/datadosen/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}">
                            <div class="text-danger">
                                @error('nip') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" placeholder="Masukkan Nama Dosen" value="{{ old('nama_dosen') }}">
                            <div class="text-danger">
                                @error('nama_dosen') {{ $message }} @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" class="form-control" id="mata_kuliah" placeholder="Masukkan Mata Kuliah" value="{{ old('mata_kuliah') }}">
                            <div class="text-danger">
                                @error('mata_kuliah') {{ $message }} @enderror
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
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
