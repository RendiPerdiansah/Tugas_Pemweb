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
        <!-- general form elements -->
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Add</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="/dosen/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_dosen">ID Dosen</label>
                            <input type="text" name="id_dosen" class="form-control" id="id_dosen" 
                                   placeholder="ID Dosen akan dibuat otomatis" value="Auto-generated" readonly>
                            <div class="text-danger">
                                @error('id_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" class="form-control" id="nip" 
                                   placeholder="Masukan NIP" value="{{ old('nip') }}" maxlength="16">
                            <div class="text-danger">
                                @error('nip')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_dosen">Nama Dosen</label>
                            <input type="text" name="nama_dosen" class="form-control" id="nama_dosen" 
                                   placeholder="Masukan Nama Dosen" value="{{ old('nama_dosen') }}">
                            <div class="text-danger">
                                @error('nama_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jk_dosen">Jenis Kelamin</label>
                            <select name="jk_dosen" class="form-control" id="jk_dosen">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jk_dosen') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jk_dosen') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <div class="text-danger">
                                @error('jk_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_jurusan">Jurusan</label>
                            <select name="id_jurusan" class="form-control" id="id_jurusan">
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_jurusan')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_prodi">Program Studi</label>
                            <select name="id_prodi" class="form-control" id="id_prodi">
                                <option value="">-- Pilih Program Studi --</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id_prodi }}" {{ old('id_prodi') == $p->id_prodi ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                                @endforeach
                            </select>
                            <div class="text-danger">
                                @error('id_prodi')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="foto_dosen">Foto Dosen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto_dosen" class="custom-file-input" id="foto_dosen">
                                    <label class="custom-file-label" for="foto_dosen">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                            <div class="text-danger">
                                @error('foto_dosen')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
