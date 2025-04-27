@section('title')
Dosen
@endsection
@extends('layout.v_tamplate')
@section('page')
Halaman detail mahasiswa
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="exanmpleInputEmail1">NIM : </label>
                {{ $mahasiswa->nim }}
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Nama Mahasiswa : </label>
                    {{ $mahasiswa->nama }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Jurusan : </label>
                    {{ $mahasiswa->jurusan }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Prodi : </label>
                    {{ $mahasiswa->prodi }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Tempat, Tanggal Lahir : </label>
                    {{ $mahasiswa->ttl }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Alamat : </label>
                    {{ $mahasiswa->alamat }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Agama : </label>
                    {{ $mahasiswa->agama }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Tingkat : </label>
                    {{ $mahasiswa->tingkat }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputFile">Semester : </label>
                    {{ $mahasiswa->semester }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Nomor Hp : </label>
                    {{ $mahasiswa->no_hp }}
                </div>
                <dif class="form-group">
                    <label for="exanmpleInputFile">Foto : </label>
                    <img src="{{ url('foto_mahasiswa/'.$mahasiswa->foto_mahasiswa) }}" width="200px">
            </div>
                </div>
                <!--card-body-->
                <div class="card-footer">
                    <a href="/mahasiswa"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
    </form>
</div>
@endsection