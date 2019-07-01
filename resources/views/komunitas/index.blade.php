@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-cubes"></i> Agenda Komunitas</h1>
    <p>List Jadwal Agenda Komunitas </p>
  </div>
  <a class="btn btn-primary" href="#"><i class="fa fa-plus fa-lg"></i></a>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body table-responsive">
        <table class="table table-hover table-bordered" id="sampleTable" width="150%">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Personal</th>
              <th>Nama Komunitas</th>
              <th>Telp</th>
              <th>E-mail</th>
              <th>Tgl Pinjam</th>
              <th>Waktu Pinjam</th>
              <th>Tujuan Kegiatan</th></th>
              <th>Jumlah Peserta</th>
              <th>Status</th>
              <th>Publish</th>
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
                <td>{{$d->data->nama_personal}}</td>
                <td>{{$d->data->nama_komunitas}}</td>
                <td>{{$d->data->telp}}</td>
                <td>{{$d->data->email}}</td>
                <td>{{\Carbon\Carbon::parse($d->data->tanggal_pinjam)->format('d M Y')}}</td></td>
                <td>{{$d->data->waktu_pinjam}}</td></td>
                <td>{{$d->data->tujuan}}</td>
                <td>{{$d->data->jumlah_peserta}}</td>
                <td>{{$d->data->verifikasi}}</td>
                <td>{{$d->data->publish}}</td>
                <td>Aksi</td>
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
