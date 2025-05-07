@extends('layout.v_tamplate')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">HALAMAN ABOUT</h1>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <H3>Title</H3>
    </div>
    <div class="card-body">
        <a>Politeknik Negeri Subang</a>
        <br>
        <a>Jln Brigjen Katamso Dangdeur Kec Subang Kab Subang</a>
        
    </div>
    <!-- /.card-body -->
     <div class="card-footer">
        Footer
    </div>
    <!-- /.card-footer-->
</div>
@endsection