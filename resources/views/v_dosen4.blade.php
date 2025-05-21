@extends('layout.v_tamplate')

@section('title', 'Dosen')

@section('page', 'Halaman Dosen')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Dosen</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success</h5>
            {{ session('pesan') }}
        </div>
        @endif

        <div class="mb-3 text-right">
            <a href="/datadosen/add" class="btn btn-info btn-sm">Add Data</a>
            <a href="/datadosen/print" target="_blank" class="btn btn-primary btn-sm ml-2">Print</a>
        </div>

        <table id="example" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Bidang Keahlian</th>
                        <th>Foto Dosen</th>
                        <th>Program Studi</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($dosen as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nidn }}</td>
                    <td>{{ $data->nama_dosen }}</td>
                    <td>{{ $data->bidang_keahlian }}</td>
                    <td><img src="{{ url('foto_dosen/'.$data->foto_dosen) }}" width="100px"></td>
                    <td>{{ $data->nama_prodi }}</td>
                    <td>{{ $data->nama_jurusan }}</td>
                    <td>
                        <a href="/datadosen/detail/{{ $data->nidn }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/datadosen/edit/{{ $data->nidn }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->nidn }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Bidang Keahlian</th>
                        <th>Foto Dosen</th>
                        <th>Program Studi</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
        </table>

        {{-- Modal Delete --}}
        @foreach ($dosen as $data)
        <div class="modal fade" id="delete{{ $data->nidn }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title">Data Dosen : {{ $data->nama_dosen }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/datadosen/delete/{{ $data->nidn }}" class="btn btn-outline-light">Yes</a>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
            
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
