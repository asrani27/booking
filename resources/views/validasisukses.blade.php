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
            <div class="col-lg-12">
                <div class="contact_info">
                <div class="section_title">Validasi Sukses!! Terima Kasih!</div>
                   
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
