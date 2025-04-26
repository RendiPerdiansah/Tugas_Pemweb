@section('title')
Dosen
@endsection
@extends('layout.v_tamplate')
@section('page')
Halaman detail dosen
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
                <label for="exanmpleInputEmail1">NIP : </label>
                {{ $dosen->nip }}
                <div class="form-group">
                    <label for="exanmpleInputPassword1">Nama Dosen : </label>
                    {{ $dosen->nama_dosen }}
                </div>
                <div class="form-group">
                    <label for="exanmpleInputFile">Mata Kuliah : </label>
                    {{ $dosen->mata_kuliah }}
                </div>  
                <dif class="form-group">
                    <label for="exanmpleInputFile">Foto : </label>
                    <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="200px">
            </div>
                </div>
                <!--card-body-->
                <div class="card-footer">
                    <a href="/dosen"><button type="button" class="btn btn-primary">Kembali</button></a>
                </div>
    </form>
</div>
@endsection