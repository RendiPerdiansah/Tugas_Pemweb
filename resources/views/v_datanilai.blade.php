@extends('layout.v_tamplate')

@section('title', 'Data Nilai')

@section('page', 'Data Nilai')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kelola Data Nilai</h3>
        <a href="{{ route('nilai.add') }}" class="btn btn-primary float-right">Add Data Nilai</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>ID Nilai</th>
                    <th>Dosen</th>
                    <th>Mata Kuliah</th>
                    <th>Tahun Akademik</th>
                    <th>Komposisi Nilai Lain-lain (%)</th>
                    <th>Komposisi Nilai UTS (%)</th>
                    <th>Komposisi Nilai UAS (%)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilai as $data)
                <tr>
                    <td>{{ $data->id_nilai }}</td>
                    <td>{{ $data->nama_dosen }}</td>
                    <td>{{ $data->nama_matakuliah }}</td>
                    <td>{{ $data->tahun_akademik }}</td>
                    <td>{{ $data->komposisi_nilai_lain }}</td>
                    <td>{{ $data->komposisi_nilai_uts }}</td>
                    <td>{{ $data->komposisi_nilai_uas }}</td>
                    <td>
                        <a href="{{ route('nilai.detail', $data->id_nilai) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('nilai.edit', $data->id_nilai) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('nilai.delete', $data->id_nilai) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
