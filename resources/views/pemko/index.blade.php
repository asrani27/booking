@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-institution"></i> Agenda Pemko</h1>
    <p>List Jadwal Agenda Komunitas Bersama Pemerintah Kota Banjarmasin </p>
  </div>
<a class="btn btn-primary" href="{{route('addPemko')}}"><i class="fa fa-plus fa-lg"></i></a>
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
              <th>Kuota Peserta</th>
              <th>Tgl Kegiatan</th>
              <th>Biaya</th>
              <th>Brosur(File)</th>
              <th>Publish</th>
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
                <td><a href={{url("agendapemko/daftarpeserta/{$d->id}")}}>{{$d->data->nama_kegiatan}}</a></td>
                <td>{{$d->data->pembicara}}</td>
                <td>{{$d->data->topik_kegiatan}}</td>
                <td>{{$d->data->jml_peserta}} Orang</td>
                <td>{{$d->data->kuota_peserta}} Orang</td>
                <td>{{$d->data->tanggal_kegiatan}}</td>
                <td>
                  @if($d->data->biaya == 'Gratis')
                  Gratis
                  @else
                  {{format_uang((int)$d->data->biaya)}}
                  @endif
                </td>
                <td><a href={{url("storage/{$d->data->file}")}} target="_blank">Download</a></td>
                <td>{{$d->data->publish}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("agendapemko/edit/{$d->id}")}} ><i class="fa fa-edit"></i> Edit</a>
                            <a class="dropdown-item" href={{url("agendapemko/delete/{$d->id}")}} onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> Hapus</a>
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
