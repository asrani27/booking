@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-users"></i> Pesan Tempat Plaza</h1>
    <p>Pesan Tempat Untuk Acara Komunitas</p>
  </div>
</div>
@endsection

@section('content')
@if($status == 0)
<div class="row">
    <div class="col-lg-12">
      <div class="bs-component">
        <div class="alert alert-dismissible alert-warning">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <h4>Informasi!</h4>
          <p>Halaman ini untuk pesan tempat plaza bagi Komunitas, Status anda adalah personal, silahkan datang langsung ke Plaza SmartCity Untuk Menikmati Layanan</p>
        </div>
      </div>
    </div>
</div>
@elseif($status == 2)
<div class="row">
    <div class="col-lg-12">
      <div class="bs-component">
        <div class="alert alert-dismissible alert-warning">
          <button class="close" type="button" data-dismiss="alert">×</button>
          <h4>Informasi!</h4>
          <p>Halaman ini untuk pesan tempat plaza bagi Komunitas, Hanya penanggung Jawab / Ketua Komunitas yang dapat akses halaman ini. Status anda adalah Anggota Komunitas Bukan Penanggung Jawab, silahkan Gunakan Akun Penanggung Jawab Komunitas</p>
        </div>
      </div>
    </div>
</div>
@elseif($status == 1)
<div class="row">
  <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Pesan Tempat Plaza SmartCity</h3>
        <div class="tile-body">
        <form class="form-horizontal" method="POST" action="{{route('pesanTempat')}}">
            {{ csrf_field() }}
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Personal (Yg Terdaftar Di Plaza)</label>
              <div class="col-md-8">
            
              <input class="form-control" type="hidden" name="user_id" readonly value="{{Auth::user()->id}}">
              
              <input class="form-control" type="text" name="nama_personal" readonly value="{{Auth::user()->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Nama Komunitas (Yg Terdaftar Di Plaza)</label>
              <div class="col-md-8">
                    <select class="form-control" name="nama_komunitas" id="demoSelec" required>
                            @foreach ($komunitas as $w)
                                <option value="{{$w->nama_komunitas}}">{{$w->nama_komunitas}}</option>
                            @endforeach
                    </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">No Telp Yang Ada WA</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  name="telp" required  maxlength="16" onkeypress="return hanyaAngka(event)">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Email Valid</label>
              <div class="col-md-8">
                    <input class="form-control" type="email"  name="email" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Tanggal Pesan</label>
              <div class="col-md-8">
                  
              <input class="form-control demoDate" id="demoDate" type="text" placeHolder="Pilih Tanggal"  name="tanggal_pinjam">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Waktu Pesan</label>
              <div class="col-md-8">
                    <select class="form-control" name="waktu_pinjam" id="demoSelect">
                    </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Tujuan Kegiatan</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  name="tujuan" required>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-3">Jumlah Peserta</label>
              <div class="col-md-8">
                    <input class="form-control" type="text"  name="jumlah_peserta" maxlength="3" required onkeypress="return hanyaAngka(event)">
              </div>
            </div>
        </div>
        <div class="tile-footer">
          <div class="row">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Pesan</button>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary" href="{{url('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cek History</a>
            </div>
          </div>
        </div>
      </form>
      </div>
  </div>
</div>
@endif


@endsection

@push('add_js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{url('vali/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('vali/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{url('vali/js/plugins/select2.min.js')}}"></script>
    
    <script>
      function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
        $('.demoDate').change(function () {
          var tanggal = document.getElementById("demoDate").value;
          $.ajax({
            type: 'POST',
            url: 'waktu',
            data:{
              'tanggal':tanggal,
              '_token': $('input[name=_token]').val()
            },
            success: function (response) {
                  var obj = response[0];
                  var status = response[1];
                  var komunitas = response[2];
                  if(status == 'tersedia')
                  {
                      $('#demoSelect').find('option').remove().end();
                      $.each( obj, function( key, value ) {
                      var newOption = new Option(value.jam, value.id, false, false);
                      $('#demoSelect').append(newOption);
                      });
                  }
                  else
                  {
                    $('#demoSelect').find('option').remove().end();
                    alert('Pada tanggal ini sudah di pesan oleh komunitas');
                  }
              }
          }); 
        });

    $('#demoSelet').select2();
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
