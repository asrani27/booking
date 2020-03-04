@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-users"></i> Daftarkan Komunitas Anda</h1>
    <p>Buat Komunitas Anda Sendiri</p>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Form Komunitas Plaza SmartCity</h3>
        <div class="tile-body">
      <form class="form-horizontal" method="POST" action="{{route('saveKomunitasMember')}}">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Komunitas</label>
              <div class="col-md-8">
                    <input class="form-control" type="text" name="nama_komunitas" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Deskripsi</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  name="deskripsi" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Penanggung Jawab</label>
              <div class="col-md-8">
                <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
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
    <script type="text/javascript" src="{{url('vali/js/plugins/select2.min.js')}}"></script>
    <script>

    $('#demoSelect').select2();
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
