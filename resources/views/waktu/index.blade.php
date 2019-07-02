@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-cubes"></i> Setting Waktu</h1>
    <p>List Waktu Peminjaman Plaza SmartCity </p>
  </div>
  <a class="btn btn-primary tambah-waktu" href="#" onclick="tambahWaktu()"><i class="fa fa-plus fa-lg"></i></a>
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
              <th>Nama Hari</th>
              <th>Waktu Peminjaman</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            ?>
            @foreach ($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama_hari}}</td>
                <td>{{$d->jam}}</td>
                <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                          <div class="btn-group" role="group">
                            <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item edit-waktu" data-id="{{$d->id}}" data-nama_hari="{{$d->nama_hari}}" data-jam="{{$d->jam}}"><i class="fa fa-edit"></i> Edit</a>
                              <a class="dropdown-item" href={{url("setting/waktu/delete/{$d->id}")}} onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> Hapus</a>
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
        <h5 class="modal-title">Tambah Waktu Peminjaman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
    <form class="form-horizontal" method="POST" action="{{route('saveTime')}}">
          {{ csrf_field() }}
      <div class="modal-body">
        
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Nama Hari</label>
          <input class="form-control" id="namaHari" type="text" name="nama_hari" required>
        </div>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Jam</label>
          <input class="form-control" id="jam" type="text" name="jam" required>
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

{{-- Ini Modal Edit --}}
<div class="modal fade" id="modal-edit" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Edit Waktu Peminjaman</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
    <form class="form-horizontal" method="POST" action="{{route('updateTime')}}">
          {{ csrf_field() }}
      <div class="modal-body">

        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Nama Hari</label>
          <input class="form-control" id="namaHariEdit" type="text" name="nama_hari" required>
          <input class="form-control" id="iddata" type="hidden" name="iddata">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Jam</label>
          <input class="form-control" id="jamEdit" type="text" name="jam" required>
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
    <script>
    function tambahWaktu()
      {
        document.getElementById('namaHari').value = '';
        document.getElementById('jam').value = '';
        $('#modal-tambah').modal('show');
      }
    
    $(document).on('click', '.edit-waktu', function() {
      $('#iddata').val($(this).data('id'));
      $('#namaHariEdit').val($(this).data('nama_hari'));
      $('#jamEdit').val($(this).data('jam'));
      $('#modal-edit').modal('show');
    });
    </script>
@endpush
