
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo">
							<h1><font color="white">Plaza</font></h1>
						</div>
						<nav class="main_nav">
							<ul>
								{{-- <li class="active"><a href="index.html">< Portal</a></li> --}}
								<li><a href="{{url('/')}}">Home</a></li>
								<li><a href="{{url('agenda/komunitas')}}">Agenda Komunitas</a></li>
								<li><a href="{{url('agenda/pemko')}}">Agenda Plaza</a></li>
								{{-- <li><a href="{{url('booking')}}">Pesan</a></li> --}}
								<li><a href="{{url('daftar')}}">Daftar</a></li>
								<li><a href="{{url('login')}}">Login</a></li>
                            </ul>
						</nav>
						{{-- <div class="phone_num ml-auto">
							<div class="phone_num_inner">
								<img src="{{url('bluesky/images/phone.png')}}" alt=""><span>652-345 3222 11</span>
							</div>
						</div> --}}
						<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</header>

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
	