@section('Title')
Mahasiswa
@endsection
@extends('layout.v_tamplate')
@section('page')
Edit Data Mahasiswa
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <!--left column-->
        <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Edit</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/mahasiswa/update/{{ $mahasiswa->id_mahasiswa }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIM</label>
                            <input type="text" name="nim" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIM" value="{{ $mahasiswa->nim }}" readonly>
                            <div class="text-danger">
                                @error('nim')
                                {{ $message }}
                                @enderror
                        </div> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Mahasiswa" value="{{ $mahasiswa->nama }}">
                            <div class="text-danger">
                                @error('nama')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jurusan </label>
                            <input type="text" name="jurusan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jurusan " value="{{ $mahasiswa->jurusan }}">
                            <div class="text-danger">
                                @error('jurusan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prodi </label>
                            <input type="text" name="prodi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Prodi " value="{{ $mahasiswa->prodi }}">
                            <div class="text-danger">
                                @error('prodi')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tempat, Tanggal Lahir </label>
                            <input type="text" name="ttl" class="form-control" id="exampleInputEmail1" placeholder="Masukan Tempat, Tanggal Lahir " value="{{ $mahasiswa->ttl }}">
                            <div class="text-danger">
                                @error('ttl')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat </label>
                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat " value="{{ $mahasiswa->alamat }}">
                            <div class="text-danger">
                                @error('alamat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Agama </label>
                            <input type="text" name="agama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Agama " value="{{ $mahasiswa->agama }}">
                            <div class="text-danger">
                                @error('agama')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tingkat </label>
                            <input type="text" name="tingkat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Tingkat " value="{{ $mahasiswa->tingkat }}">
                            <div class="text-danger">
                                @error('tingkat')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Semester </label>
                            <input type="text" name="semester" class="form-control" id="exampleInputEmail1" placeholder="Masukan Semester " value="{{ $mahasiswa->semester }}">
                            <div class="text-danger">
                                @error('semester')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No HP </label>
                            <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomor HP " value="{{ $mahasiswa->no_hp }}">
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
                                <div class="input-form-group">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <br>
                                <div class="text-danger">
                                    @error('foto_mahasiswa')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <img src="{{ url('foto_mahasiswa/'.$mahasiswa->foto_mahasiswa) }}" width="100px">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card_footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection