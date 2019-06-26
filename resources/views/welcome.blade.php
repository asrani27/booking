<!DOCTYPE html>
<html lang="en">
<head>
<title>Bluesky</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{url('bluesky/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('bluesky/styles/responsive.css')}}">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<a href="#"><img src="{{url('bluesky/images/logo.png')}}""></a>
						</div>
						<nav class="main_nav">
							<ul>
								<li class="active"><a href="index.html">< Portal</a></li>
								<li><a href="index.html">Home</a></li>
								<li><a href="index.html">List Agenda</a></li>
								<li><a href="{{route('login')}}">Login</a></li>
                            </ul>
						</nav>
						<div class="phone_num ml-auto">
							<div class="phone_num_inner">
								<img src="{{url('bluesky/images/phone.png')}}" alt=""><span>652-345 3222 11</span>
							</div>
						</div>
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"><div><img src="{{url('bluesky/images/logo.png')}}" alt=""></div></div>
					</div>
				</a>
			</div>
			<ul>
				<li class="menu_item"><a href="index.html">Home</a></li>
				<li class="menu_item"><a href="about.html">About us</a></li>
				<li class="menu_item"><a href="#">Speakers</a></li>
				<li class="menu_item"><a href="#">Tickets</a></li>
				<li class="menu_item"><a href="news.html">News</a></li>
				<li class="menu_item"><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="menu_phone"><span>call us: </span>652 345 3222 11</div>
	</div>
	
	<!-- Home -->

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url({{url('bluesky/images/home_slider_1.jpg')}}"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<div class="home_subtitle">Banjarmasin</div>
                                        <div class="home_title">Booking Place Plaza SmarCity</div>
									</div>
                                    <div class="button recent_button"><a href="#">Booking Now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

<script src="{{url('bluesky/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{url('bluesky/styles/bootstrap4/popper.js')}}"></script>
<script src="{{url('bluesky/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{url('bluesky/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{url('bluesky/plugins/easing/easing.js')}}"></script>
<script src="{{url('bluesky/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{url('bluesky/js/custom.js')}}"></script>
</body>
</html>