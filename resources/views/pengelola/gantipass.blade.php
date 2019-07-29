@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
      <h1><i class="fa fa-user"></i> Profil Anggota Plaza</h1>
      
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Ganti Password</h3>
        <div class="tile-body">
          <form class="form-horizontal" method="POST" action="{{route('updatePass', $data->id)}}">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-8">
                <input class="form-control userreg" id="userreg" type="text" value="{{$data->username}}" name="username" readonly>
                <span id="error_user"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="password">
                <span>Note : Kosongkan password jika tidak ingin diganti</span>
              </div>
            </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
              &nbsp;&nbsp;&nbsp;
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
