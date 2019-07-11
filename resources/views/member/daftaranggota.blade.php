@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
  <h1><i class="fa fa-users"></i> Daftar Anggota Komunitas : {{$mk->nama_komunitas}}</h1>
    {{-- <p>List Daftar Komunitas Terdaftar Di Plaza SmartCity</p> --}}
  </div>
  <a class="btn btn-primary" href="{{url('komunitasku')}}">Kembali</a>
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
              <th>Nama Anggota</th>
              <th>Telp</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          ?>
          <tbody>
            @foreach ($anggota as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->telp}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("komunitasku/delete/anggota/{$mk->id}/{$d->id}")}} onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> Hapus</a>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    {{-- <script type="text/javascript" src="{{url('vali/js/plugins/select2.min.js')}}"></script> --}}
    <script>
      $(document).ready(function() {
        $('#demoSelect').select2({ width: 'resolve' });    
        
      $(document).on('click', '.add-anggota', function() {
        $('#iddata').val($(this).data('id'));
        $('#modal-tambah').modal('show');
      });
      });
    </script>
@endpush
