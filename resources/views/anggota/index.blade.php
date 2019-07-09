@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-user"></i> Daftar Anggota Plaza</h1>
    <p>List Daftar Anggota Terdaftar Di Plaza SmartCity</p>
  </div>
<a class="btn btn-primary" href="{{route('addAnggota')}}"><i class="fa fa-plus fa-lg"></i></a>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>#</th>
              <th>No Anggota</th>
              <th>Nama Anggota</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Telp</th>
              <th>Username</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          ?>
          <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>PLZ{{$d->id}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->telp}}</td>
                <td>{{$d->user->username}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("anggotaplaza/edit/{$d->id}")}} ><i class="fa fa-edit"></i> Edit</a>
                            <a class="dropdown-item" href={{url("anggotaplaza/delete/{$d->id}")}} onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> Hapus</a>
                          </div>
                        </div>
                    </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('add_js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{url('vali/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('vali/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
