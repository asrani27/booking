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
        <h3 class="tile-title">Ubah Verifikasi Agenda Komunitas</h3>
        <div class="tile-body">
          <form class="form-horizontal" method="POST" action="{{route('updateKomunitas', $data->id)}}">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Personal</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{$data->data->nama_personal}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Komunitas</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  value="{{$data->data->nama_komunitas}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Telp yg ada WA</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{$data->data->telp}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Email Valid</label>
              <div class="col-md-8">
                <input class="form-control col-md-8" type="email" value="{{$data->data->email}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Tanggal Pinjam</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  value="{{\Carbon\Carbon::parse($data->data->tanggal_pinjam)->format('d-M-Y')}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Waktu Pinjam</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{$data->data->waktu_pinjam}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Tujuan Kegiatan</label>
              <div class="col-md-8">
                <textarea class="form-control" rows="4" readonly>{{$data->data->tujuan}}"</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Jumlah Peserta</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{$data->data->jumlah_peserta}}" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Status Verifikasi</label>
              <div class="col-md-8">
                <select class="form-control" id="exampleSelect1" name="verifikasi">
                  @if($data->data->verifikasi == 0)
                  <option value=0 selected>Menunggu Persetujuan</option>
                  <option value=1>Disetujui</option>
                  <option value=2>Tidak DiSetujui</option>
                  @elseif($data->data->verifikasi == 1)
                  <option value=0>Menunggu Persetujuan</option>
                  <option value=1 selected>Disetujui</option>
                  <option value=2>Tidak DiSetujui</option>
                  @elseif($data->data->verifikasi == 2)
                  <option value=0>Menunggu Persetujuan</option>
                  <option value=1>Disetujui</option>
                  <option value=2 selected>Tidak DiSetujui</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Publish</label>
              <div class="col-md-8">
                  <select class="form-control" id="exampleSelect1" name="publish">
                    @if($data->data->publish == 'ya')
                    <option value='ya' selected>Ya</option>
                    <option value='tidak'>Tidak</option>
                    @else
                    <option value='ya'>Ya</option>
                    <option value='tidak' selected>Tidak</option>
                    @endif
                  </select>
              </div>
            </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="{{url('agendakomunitas')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
            </div>
          </div>
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
@endpush
