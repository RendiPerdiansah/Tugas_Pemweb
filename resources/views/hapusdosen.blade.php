@section('Title')
Dosen
@endsection
@extends('layout.v_tamplate')
@section('page')
Hapus Data Dosen
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
</div>
<!-- /.card-header -->
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i>succes</h5>
            {{ session('pesan')}}
        </div>  
        @endif
        <div align="right">
            <a href="/dosen/add" class="btn btn-info btn-sm">Add Data</a><br>
    </table>
</div>