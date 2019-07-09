@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-institution"></i> Daftar Peserta Agenda Pemko </h1>
    <p>List Jadwal Agenda Komunitas Bersama Pemerintah Kota Banjarmasin </p>
  </div>
<a class="btn btn-primary" href="{{url('agendapemko')}}">Kembali</a>
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
              <th>Nama</th>
              <th>E-Mail</th>
              <th>Telp</th>
            </tr>
          </thead>
          <?php
          $no = 1;
          ?>
          <tbody>
            @foreach ($peserta as $d)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->telp}}</td>
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
