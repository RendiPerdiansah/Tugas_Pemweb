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
                        <th>ID Dosen</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Jenis Kelamin</th>
                        <th>Prodi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($dosen as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->id_dosen }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama_dosen }}</td>
                    <td>{{ $item->jk_dosen }}</td>
                    <td>{{ $item->nama_prodi }}</td>
                    
                    <td><img src="{{ url('foto_dosen/'.$item->foto_dosen) }}" width="80px"></td>
                    <td>
                        <a href="/datadosen/detail/{{ $item->nip }}" class="btn btn-sm btn-success">Detail</a>
                        <a href="/datadosen/edit/{{ $item->nip }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $item->nip }}">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>ID Dosen</th>
                        <th>NIP</th>
                        <th>Nama Dosen</th>
                        <th>Jenis Kelamin</th>
                        <th>Prodi</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
        </table>

        {{-- Modal Delete --}}
        @foreach ($dosen as $item)
        <div class="modal fade" id="delete{{ $item->nip }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h6 class="modal-title">{{ $item->nama_dosen }}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="/datadosen/delete/{{ $item->nip }}" class="btn btn-outline-light">Yes</a>
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
