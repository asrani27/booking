@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
      <h1><i class="fa fa-users"></i> Daftar Komunitas Plaza</h1>
      <p>List Daftar Komunitas Terdaftar Di Plaza SmartCity</p>
  </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Edit Komunitas Plaza SmartCity</h3>
          <div class="tile-body">
        <form class="form-horizontal" method="POST" action="{{route('updateMasterKomunitas', $data->id)}}">
              {{ csrf_field() }}
              <div class="form-group row">
                <label class="control-label col-md-3">Nama Komunitas</label>
                <div class="col-md-8">
                <input class="form-control" type="text" name="nama_komunitas" value="{{$data->nama_komunitas}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Deskripsi</label>
                <div class="col-md-8">
                      <input class="form-control" type="text"  name="deskripsi" value="{{$data->deskripsi}}" required>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-md-3">Penanggung Jawab</label>
                <div class="col-md-8">
                  <select class="form-control" name="anggota_id" id="demoSelect">
                    @foreach ($anggota as $a)
                      @if($a->id == $data->anggota_id)
                      <option value="{{$a->id}}" selected>PLZ{{$a->id}} / {{$a->nama}}</option>
                      @else
                      <option value="{{$a->id}}">PLZ{{$a->id}} / {{$a->nama}}</option>
                      @endif    
                    @endforeach
                  </select>
                </div>
              </div>
              
          </div>
          <div class="tile-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                &nbsp;&nbsp;&nbsp;
                <a class="btn btn-secondary" href="{{url('komunitas')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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
    <script type="text/javascript" src="{{url('vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script>
    $('#gratis').click(function () {
        if ($(this).attr('checked')) {
            console.log('is checked');
        } else {
            console.log('is not checked');
        }
    });

    $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
    </script>
@endpush
