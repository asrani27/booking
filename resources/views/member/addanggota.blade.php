@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-user"></i> Daftar Anggota Plaza</h1>
    <p>List Daftar Anggota Terdaftar Di Plaza SmartCity</p>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tambah Anggota Plaza SmartCity</h3>
        <div class="tile-body">
      <form class="form-horizontal" method="POST" action="{{route('saveAnggotaKomunitas')}}">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Lengkap</label>
              <div class="col-md-8">
                    <input class="form-control" type="hidden" name="id_komunitas" value="{{$id}}">
                    <input class="form-control" type="text" name="nama" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Alamat</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  name="alamat" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">e-mail</label>
              <div class="col-md-8">
                    <input class="form-control emailreg" id="emailreg" type="email" name="email" required>
                    <span id="error_email"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Telp</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="telp" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Username (Untuk Login Anggota)</label>
              <div class="col-md-8">
                <input class="form-control userreg" id="userreg" type="text" name="username" required>
                <span id="error_user"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Password (Untuk Login Anggota)</label>
              <div class="col-md-8">
                <input class="form-control" type="text" name="password" required>
              </div>
            </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="{{url('komunitasku')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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
       $(".emailreg").keyup(function(){
            email = document.getElementById('emailreg').value;
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            if(!filter.test(email))
            {
                $('#error_email').html('<label class="text-danger">Format Email Salah</label>');
            }
            else
            {
                $.ajax({
                    url:"{{ route('cek.mail') }}",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result)
                    {
                        if(result === 0)
                        {
                            $('#error_email').html('<label class="text-success">Email Tersedia</label>');
                        }
                        else
                        {
                            $('#error_email').html('<label class="text-danger">Email Sudah Ada</label>');
                        }
                    }
                });
            }
        });

        $(".userreg").keyup(function(){
            user  = document.getElementById('userreg').value;
            var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('cek.user') }}",
                    method:"POST",
                    data:{username:user, _token:_token},
                    success:function(result)
                    {
                        if(result === 0)
                        {
                            $('#error_user').html('<label class="text-success">Username Tersedia</label>');
                        }
                        else
                        {
                            $('#error_user').html('<label class="text-danger">Username Sudah Ada</label>');
                        }
                    }
                }); 12
        });

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
