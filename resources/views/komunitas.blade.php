@extends('bluesky.master')

@push('add_css')
<link rel="stylesheet" type="text/css" href="{{url('bluesky/plugins/rangeslider.js-2.3.0/rangeslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/contact_responsive.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/property.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/property_responsive.css')}}">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src = "//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer ></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush

@section('content')

<div class="contact">
    <div class="container">
        <div class="row">
			<div class="col">
				<div class="section_title">Agenda Komunitas</div>
				<div class="section_subtitle">Plaza SmartCity</div>
			</div>
		</div>
        <br />
        <div class="row">
            <div class="col-lg-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Komunitas</th>
                        <th>Jumlah peserta</th>
                        <th>Tgl Pinjam</th>
                        <th>Waktu Pinjam</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                ?>
                <tbody>
                    @foreach ($mk as $m)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$m->data->nama_komunitas}}</td>
                        <td>{{$m->data->jumlah_peserta}}</td>
                        <td>{{\Carbon\Carbon::parse($m->data->tanggal_pinjam)->format('d M Y')}}</td>
                        <td>{{$m->data->waktu}}</td>
                        <td>                
                            @if($m->data->verifikasi == 0)
                            <span class="badge badge-primary">Menunggu Persetujuan</span>
                            @elseif($m->data->verifikasi == 1)
                            <span class="badge badge-success">DiSetujui</span>
                            @elseif($m->data->verifikasi == 2)
                            <span class="badge badge-danger">Tidak DiSetujui</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach          
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#example').DataTable();
    });
</script>
@endsection


@push('add_js')


@endpush
