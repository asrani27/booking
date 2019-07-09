@extends('bluesky.master')

@push('add_css')

@endpush

@section('content')

	<div class="home">
		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url({{url('bluesky/images/menara.jpg')}}"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<div class="home_subtitle">Banjarmasin</div>
                                        <div class="home_title">Working Space Plaza SmartCity</div>
									</div>
								<div class="button recent_button"><a href="{{url('booking')}}">Pesan Sekarang</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	
@endsection


@push('add_js')

@endpush
