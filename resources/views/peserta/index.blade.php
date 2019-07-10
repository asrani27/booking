@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-address-card"></i> Peserta</h1>
    <p>List data Peserta Kegiatan Bersama Pemerintah Kota Banjarmasin </p>
  </div>
  <a class="btn btn-primary" href="#"><i class="fa fa-plus fa-lg"></i></a>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Kegiatan</th>
              <th>No Registrasi</th>
              <th>Nama Peserta</th>
              <th>Telp</th>
              <th>Alamat</th>
              <th>E-mail</th>
              <th>Verifikasi</th>
            </tr>
          </thead>
          <?php
          $no =1;
          ?>
          <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{json_decode($d->pemko->data)->nama_kegiatan}}</td>
                <td>REG{{$d->id}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->telp}}</td>
                <td>{{$d->alamat}}</td>
                <td>{{$d->email}}</td>
                <td>
                  @if($d->verifikasi ==0)
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("peserta/setujui/{$d->id}")}} onclick="return confirm('Yakin Ingin Disetujui..?');"><i class="fa fa-check"></i> Setujui</a>
                            <a class="dropdown-item" href={{url("peserta/tidaksetujui/{$d->id}")}} onclick="return confirm('Yakin Tidak Disetujui..?');"><i class="fa fa-close"></i> Tidak Setujui</a>
                          </div>
                        </div>
                    </div>
                    @elseif($d->verifikasi ==1)
                    Disetujui
                    @elseif($d->verifikasi ==2)
                    Tidak Disetujui
                    @endif
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