@extends('bluesky.master')

@push('add_css')
<link rel="stylesheet" type="text/css" href="{{url('bluesky/plugins/rangeslider.js-2.3.0/rangeslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/contact_responsive.css')}}">

<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/property.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/property_responsive.css')}}">


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')

<div class="contact">
    <div class="container">
        <div class="row">
            <!-- Booking Info -->
            <div class="col-lg-4">
                <div class="contact_info">
                <div class="section_title">Daftar Sebagai Anggota <br />Plaza SmartCity</div>
                    <div class="contact_info_text">
                        <p>
                            Silahkan Isi Formulir secara lengkap
                        </p>
                    </div>
                    <div class="contact_info_content">
                        <ul class="contact_info_list">
                            <li>
                                <div>Alamat:</div>
                                <div>Menara Pandang, Lt.3</div>
                            </li>
                            <li>
                                <div>Phone:</div>
                                <div>+62 823 5262 2199</div>
                            </li>
                            <li>
                                <div>Email:</div>
                                <div>bjmplazasmartcity@gmail.com</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Booking Form -->
            <div class="col-lg-8">
                <div class="contact_form_container">
                    <form action="{{route('storeAnggota')}}" class="contact_form" id="contact_form" method="POST">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6 contact_name_col">
                                <input type="text" class="contact_input" name="nama" placeholder="" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="contact_input" name="telp" value="0811-5014255" required maxlength="16" onkeypress="return hanyaAngka(event)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 contact_name_col">
                                <input type="text" class="contact_input" name="alamat" value="Jl. RE. Martadinata No 1 Kota Banjarmasin" placeholder="Alamat" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="contact_input" name="email"  value="walikota@banjarmasinkota.go.id" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 contact_name_col">
                                <input type="text" class="contact_input" name="username"  value="walikota" required>
                            </div>
                            <div class="col-lg-6">
                                <input type="password" class="contact_input" name="password"  value="pemkobjm" required>
                            </div>
                        </div>
                        <button class="contact_button button" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('add_js')


<script src="{{url('bluesky/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{url('bluesky/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{url('bluesky/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{url('bluesky/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{url('bluesky/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{url('bluesky/plugins/rangeslider.js-2.3.0/rangeslider.min.js')}}"></script>
<script src="{{url('bluesky/js/property.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>

@endpush
