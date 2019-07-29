@extends('layouts.master')

@push('add_css')

@endpush

@section('title')
<div class="app-title">
  <div>
    <h1><i class="fa fa-dashboard"></i> Beranda</h1>
    <p>Selamat Datang Di Aplikasi Plaza SmartCity</p>
  </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6 col-lg-6">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
      <div class="info">
        <h4>Total Peserta</h4>
      <p><b>{{$peserta}}</b></p>
      </div>
    </div>
  </div>
  {{-- <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
      <div class="info">
        <h4>Total Komunitas</h4>
        <p><b>{{$komunitas}}</b></p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
      <div class="info">
        <h4>Agenda Komunitas</h4>
        <p><b>{{$agendakomunitas}}</b></p>
      </div>
    </div>
  </div> --}}
  <div class="col-md-6 col-lg-6">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
      <div class="info">
        <h4>Agenda Pemko</h4>
        <p><b>{{$agendapemko}}</b></p>
      </div>
    </div>
  </div>
</div>
{{-- <div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <h3 class="tile-title">Pesanan Terbaru</h3>
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Start date</th>
              <th>Salary</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Donna Snider</td>
              <td>Customer Support</td>
              <td>New York</td>
              <td>27</td>
              <td>2011/01/25</td>
              <td>$112,000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> --}}
@endsection

@push('add_js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{url('vali/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('vali/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
