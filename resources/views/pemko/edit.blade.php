@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-cubes"></i> Agenda Pemko</h1>
    <p>List Jadwal Agenda Komunitas bersama Pemerintah Kota Banjarmasin </p>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Edit Agenda Pemerintah Kota</h3>
        <div class="tile-body">
          <form class="form-horizontal" method="POST" action="{{route('updateAgendaPemko', $data->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Kegiatan</label>
              <div class="col-md-8">
              <input class="form-control" type="text" value="{{$data->data->nama_kegiatan}}" name="nama_kegiatan">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Pembicara</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"   value="{{$data->data->pembicara}}" name="pembicara">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Topik Kegiatan</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  value="{{$data->data->topik_kegiatan}}" name="topik_kegiatan">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Quota Peserta</label>
              <div class="col-md-8">
                <input class="form-control" type="text"  value="{{$data->data->kuota_peserta}}" name="kuota_peserta"  onkeypress="return hanyaAngka(event)">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Tanggal Kegiatan</label>
              <div class="col-md-8">
                <input class="form-control" id="demoDate" type="text" name="tanggal_kegiatan" value="{{$data->data->tanggal_kegiatan}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Biaya</label>
              <div class="col-md-8">
                  @if($data->data->biaya == 'Gratis')
                  <input class="form-control col-md-4" type="text" name="biaya" value="0"  onkeypress="return hanyaAngka(event)"> 
                  <div class="animated-checkbox">
                      <label>
                        <input type="checkbox" id="gratis" name="gratis" checked><span class="label-text"><b>Gratis</b></span>
                      </label>
                  </div>
                  @else
                  <input class="form-control col-md-4" type="text" name="biaya" value="{{$data->data->biaya}}"> 
                  <div class="animated-checkbox">
                      <label>
                        <input type="checkbox" id="gratis" name="gratis"><span class="label-text"><b>Gratis</b></span>
                      </label>
                  </div>
                  @endif
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Gambar Brosur</label>
              <div class="col-md-8">
                <input type="file" name="file">
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
              <a class="btn btn-secondary" href="{{url('agendapemko')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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
    
    <script>
      function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>
@endpush
