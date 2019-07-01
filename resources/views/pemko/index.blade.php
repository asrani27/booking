@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-institution"></i> Agenda Pemko</h1>
    <p>List Jadwal Agenda Komunitas Bersama Pemerintah Kota Banjarmasin </p>
  </div>
  <a class="btn btn-primary" href="#"><i class="fa fa-plus fa-lg"></i></a>
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
              <th>Nama Kegiatan</th>
              <th>Pembicara</th>
              <th>Topik Kegiatan</th>
              <th>Jml Peserta Saat Ini</th>
              <th>Target Peserta</th>
              <th>Kuota Peserta</th>
              <th>Tgl Kegiatan</th>
              <th>Biaya</th>
              <th>Brosur(File)</th>
              <th>Publish</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>1</th>
              <th>Nama Kegiatan</th>
              <th>Pembicara</th>
              <th>Topik Kegiatan</th>
              <th>Jml Peserta Saat Ini</th>
              <th>Target Peserta</th>
              <th>Kuota Peserta</th>
              <th>Tgl Kegiatan</th>
              <th>Biaya</th>
              <th>Brosur(File)</th>
              <th>Publish</th>
              <th>Aksi</th>
            </tr>
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
