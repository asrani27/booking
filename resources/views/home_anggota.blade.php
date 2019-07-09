@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Beranda</h1>
    <p>Selamat Datang Di Aplikasi Plaza SmartCity</p>
  </div>
  <a class="btn btn-primary" href="{{route('pesan')}}">Pesan Tempat</a>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h3 class="tile-title">History Pemesanan Tempat Plaza SmartCity</h3>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Pemesan</th>
              <th>Nama Komunitas</th>
              <th>Tanggal Pinjam</th>
              <th>Waktu Pinjam</th>
              <th>Verifikasi</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          ?>
          <tbody>
            @foreach ($data as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama_personal}}</td>
                <td>{{$d->nama_komunitas}}</td>
                <td>{{\Carbon\Carbon::parse($d->tanggal_pinjam)->format('d M Y')}}</td>
                <td>{{$d->waktu}}</td>
                <td>
                  @if($d->verifikasi == 0)
                    <span class="badge badge-primary">Menunggu Persetujuan</span>
                  @elseif($d->verifikasi == 1)
                    <span class="badge badge-success">DiSetujui</span>
                  @elseif($d->verifikasi == 2)
                    <span class="badge badge-danger">Tidak DiSetujui</span>
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
