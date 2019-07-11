@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-users"></i> Daftar Komunitas Saya</h1>
    <p>List Daftar Komunitas Terdaftar Di Plaza SmartCity</p>
  </div>
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
              <th>Nama Komunitas</th>
              <th>Deskripsi Komunitas</th>
              <th>Penanggung Jawab</th>
              <th>Jumlah Anggota</th>
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
                <td><a href={{url("komunitasku/daftaranggota/{$d->id}")}}>{{$d->nama_komunitas}}</a></td>
                <td>{{$d->deskripsi}}</td>
                <td>{{$d->ketua->nama}}</td>
                <td>{{$d->jumlah_anggota}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("komunitasku/{$d->id}/addanggota")}}><i class="fa fa-user"></i> Tambah Anggota</a>
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
{{-- Ini Modal Tambah --}}
<div class="modal fade" id="modal-tambah" style="display: none;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Anggota Ke Komunitas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
      <form class="form-horizontal" method="POST" action="{{route('saveAnggotaKomunitasku')}}">
            {{ csrf_field() }}
        <div class="modal-body">
          
        <div class="tile-body">
            <div class="form-group row">
                <label class="control-label col-md-3">Pilih Anggota</label>
                <div class="col-md-8">
                  <input type="hidden" id="iddata" name="iddata">
                  <select class="form-control" name="anggota_id" id="demoSelect" style="width: 80%;">
                  </select>
                </div>
              </div>
        </div>
          
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Keluar</button>
          </div>
        </form>  
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
