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
				<div class="section_title">Agenda Plaza SmartCity</div>
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
                        <th>Nama Kegiatan</th>
                        <th>Pembicara</th>
                        <th>Tanggal</th>
                        <th>Quota Peserta</th>
                        <th>Jml Peserta Saat Ini</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                ?>
                <tbody>
                    @foreach ($pk as $m)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$m->data->nama_kegiatan}}</td>
                        <td>{{$m->data->pembicara}}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('d/m/Y', $m->data->tanggal_kegiatan)->format('d M Y')}}</td>
                        <td>{{$m->data->kuota_peserta}} Orang</td>
                        <td>{{$m->data->jml_peserta}} Orang</td>
                        <td>
                            <a href={{url("agenda/pemko/daftar/{$m->id}")}}><span class="badge badge-primary">Daftar Jadi Peserta</span></a>
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
