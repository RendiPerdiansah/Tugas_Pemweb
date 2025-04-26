@section('title')
dosen
@endsection
@extends('layout.v_tamplate')
@section('page')
Halaman Mahasiswa
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
       <table id="example" class="table table-bordered table-striped">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible"></div>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>succes</h5>
            {{ session('pesan')}}
        </div>    
        @endif
        <div align="right">
            <a href="/mahasiswa/add" class="btn btn-info btn-sm">Add Data</a><br>
        </div>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Prodi</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Tingkat</th>
                <th>Semester</th>
                <th>No HP</th>
                <th>Foto Mahasiswa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($mahasiswa as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jurusan }}</td>
                <td>{{ $data->prodi }}</td>
                <td>{{ $data->ttl }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->agama }}</td>
                <td>{{ $data->tingkat }}</td>
                <td>{{ $data->semester }}</td>
                <td>{{ $data->no_hp }}</td>
                <td><img src="{{ url('foto_mahasiswa/'.$data->foto_mahasiswa) }}" width="100px"</td>
                <td>
                    <a href="/mahasiswa/detail/{{ $data->id_mahasiswa }}" class="btn btn-sm btn-success">Detail</a>
                    <a href="/mahasiswa/edit/{{ $data->id_mahasiswa }}" class="btn btn-sm btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_mahasiswa}}">Delete</button>
                </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Tingkat</th>
                    <th>Semester</th>
                    <th>No HP</th>
                    <th>Foto Mahasiswa</th>
                    <th>Action</th>
                </tr> 
            </tfoot>
       </table>
       @foreach ($mahasiswa as $data )
       <div class="modal fade" id="delete{{ $data->id_mahasiswa }}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h6 class="modal-title">{{ $data->nama }}</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="/mahasiswa/delete/{{ $data->id_mahasiswa }}" class="btn btn-outline-light">Yes</a>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> 
       @endforeach

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
@endsection