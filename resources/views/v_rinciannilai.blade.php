@extends('layout.v_tamplate')

@section('title', 'Rincian Data Nilai')

@section('page', 'Rincian Data Nilai')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nilai Perkuliahan</h3>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary float-right">Kembali</a>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Program Studi:</strong> {{ $nilai->nama_prodi ?? '-' }}</p>
                <p><strong>Mata Kuliah:</strong> {{ $nilai->nama_matakuliah }}</p>
                <p><strong>Semester:</strong> {{ $nilai->semester ?? '-' }}</p>
                <p><strong>Dosen Pengampu:</strong> {{ $nilai->nama_dosen }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Tahun Akademik:</strong> {{ $nilai->tahun_akademik }}</p>
                <p><strong>Kelas:</strong> {{ $nilai->kelas ?? '-' }}</p>
                <p><strong>Jurusan:</strong> {{ $nilai->nama_jurusan ?? '-' }}</p>
            </div>
        </div>

        <h5>Komposisi Nilai</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <p><strong>Nilai Lain-lain (%):</strong> {{ $nilai->komposisi_nilai_lain }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Nilai UTS (%):</strong> {{ $nilai->komposisi_nilai_uts }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Nilai UAS (%):</strong> {{ $nilai->komposisi_nilai_uas }}</p>
            </div>
        </div>

        <div class="card-header">

        <a href="" class="btn btn-primary float-right">Tambah data nilai</a>
    </div>
        <h5>Rincian Detail Nilai</h5>
        <table class="table table-bordered" id="detailNilaiTable">
            <thead>
                <tr>
                    <th>Nu</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nilai Lain-lain</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailMahasiswa as $index => $detail)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $detail->nim }}</td>
                    <td>{{ $detail->nama }}</td>
                    <td>{{ $detail->tugas }}</td>
                    <td>{{ $detail->nilai_uts ?? $detail->uts }}</td>
                    <td>{{ $detail->nilai_uas ?? $detail->uas }}</td>
                    <td>{{ $detail->nilai_akhir }}</td>
                    <td>{{ $detail->grade }}</td>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit Nilai</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete Nilai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
