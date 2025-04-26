@extends('layout.v_tamplate')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        Ini halaman home
    </div>
    <div class="card-body">
        Ini halaman home
        <h4>{{$nama_pt}}</h4>
        <h4>{{$alamat}}</h4>
    </div>
    <!-- /.card-body -->
     <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
@endsection