@extends('layout.v_tamplate')

@section('title')
    Dosen
@endsection

@section('page')
    Halaman Detail Dosen
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Dosen</h3>
    </div>

    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="nip">NIP:</label>
                <p>{{ $dosen->nip }}</p>
            </div>

            <div class="form-group">
                <label for="nama_dosen">Nama Dosen:</label>
                <p>{{ $dosen->nama_dosen }}</p>
            </div>

            <div class="form-group">
                <label for="mata_kuliah">Mata Kuliah:</label>
                <p>{{ $dosen->mata_kuliah }}</p>
            </div>

            <div class="form-group">
                <label for="foto_dosen">Foto:</label><br>
                <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="200px" alt="Foto Dosen">
            </div>
        </div>

        <div class="card-footer">
            <a href="/datadosen" class="btn btn-primary">Kembali</a>
        </div>
    </form>
</div>
@endsection
