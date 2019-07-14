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
					<div class="home_slider_background" style="background-image:url({{url('bluesky/wall.JPG')}}"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<div class="home_subtitle"></div>
                                        <div class="home_title">Banjarmasin Plaza <br />SmartCity</div>
									</div><br /><br /><br /><br /><br /><br />
								<div class="button recent_button"><a href="{{url('daftar')}}">Daftar Jadi Anggota</a></div>
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
