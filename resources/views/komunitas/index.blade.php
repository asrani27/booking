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
                <td>{{$d->data->jumlah_peserta}}</td>
                <td>
                  @if($d->data->verifikasi == 0)
                    <span class="badge badge-primary">Menunggu Persetujuan</span>
                  @elseif($d->data->verifikasi == 1)
                    <span class="badge badge-success">DiSetujui</span>
                  @elseif($d->data->verifikasi == 2)
                    <span class="badge badge-danger">Tidak DiSetujui</span>
                  @endif
                </td>
                <td>{{$d->data->publish}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                          <button class="btn btn-primary btn-sm" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gears"></i></button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href={{url("agendakomunitas/edit/{$d->id}")}} ><i class="fa fa-edit"></i> Edit</a>
                            <a class="dropdown-item" href={{url("agendakomunitas/delete/{$d->id}")}} onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> Hapus</a>
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
