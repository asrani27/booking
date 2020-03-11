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
      <div class="tile-body  table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Kegiatan</th>
              <th>No Registrasi</th>
              <th>Nama Peserta</th>
              <th>Telp</th>
              <th>E-mail</th>
              <th>Verifikasi</th>
              <th>Tgl & Jam</th>
              <th>Aksi</th>
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
                <td>{{$d->email}}</td>
                <td>
                  
                    @if($d->verifikasi == 0)
                    Di Proses
                    @elseif($d->verifikasi == 2)
                    Tidak DiSetujui
                    @elseif($d->verifikasi == 1)
                    Disetujui
                    @endif
                    
                </td>
                <td>{{\Carbon\Carbon::parse($d->created_at)->formatLocalized('%A, %d %B %Y %H:%I:%S')}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("agenda/validasi/{$d->id}")}} onclick="return confirm('Setujui Dan Kirim Undangan..?');"><i class="fa fa-check"></i> Setujui</a>
                            <a class="dropdown-item" href={{url("peserta/tidaksetujui/{$d->id}")}} onclick="return confirm('Yakin Tidak Disetujui..?');"><i class="fa fa-close"></i> Tidak Setujui</a>
                            <a class="dropdown-item" href={{url("peserta/hapus/{$d->id}")}} onclick="return confirm('Yakin Ingin Dihapus..?');"><i class="fa fa-trash"></i> Hapus</a>
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
