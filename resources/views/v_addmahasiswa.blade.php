@section('Title')
Mahasiswa
@endsection
@extends('layout/v_tamplate')
@section('page')
Tambah Data Mahasiswa
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!--left column-->
        <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/mahasiswa/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">NIM</label>
                    <input type="text" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIM" value="{{ old('nim') }}">
                    <div class="text-danger">
                        @error('nim')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Mahasiswa" value="{{ old('nama') }}">
                    <div class="text-danger">
                        @error('nama')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jurusan" value="{{ old('jurusan') }}">
                    <div class="text-danger">
                        @error('jurusan')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prodi</label>
                    <input type="text" name="prodi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Prodi" value="{{ old('prodi') }}">
                    <div class="text-danger">
                        @error('prodi')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat, Tanggal Lahir</label>
                    <input type="text" name="ttl" class="form-control" id="exampleInputEmail1" placeholder="Masukan Tempat, Tanggal Lahir" value="{{ old('ttl') }}">
                    <div class="text-danger">
                        @error('ttl')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat" value="{{ old('alamat') }}">
                    <div class="text-danger">
                        @error('alamat')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Agama</label>
                    <input type="text" name="agama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Agama" value="{{ old('agama') }}">
                    <div class="text-danger">
                        @error('agama')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tingkat</label>
                    <input type="text" name="tingkat" class="form-control" id="exampleInputEmail1" placeholder="Masukan tingkat" value="{{ old('tingkat') }}">
                    <div class="text-danger">
                        @error('tingkat')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <input type="text" name="semester" class="form-control" id="exampleInputEmail1" placeholder="Masukan Semester" value="{{ old('semester') }}">
                    <div class="text-danger">
                        @error('semester')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No HP</label>
                    <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP" value="{{ old('no_hp') }}">
                    <div class="text-danger">
                        @error('no_hp')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Foto Mahasiswa</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="foto_mahasiswa" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                </div>
                <br>
                <div class="text-danger">
                    @error('foto_mahasiswa')
                    {{ $message }}
                    @enderror
                </div>
            </div>       
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Insert</button>
    </div>
</form>
</div>
<!-- /.card -->
</div>
</div>
</div>
@endsection