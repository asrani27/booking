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
                                        <div class="home_title"><br /></div>
									</div><br /><br /><br /><br /><br /><br /><br /><br /><br />
								<div class="button recent_button"><a href="{{url('daftar')}}">Daftar Jadi Anggota</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<!-- Modal -->
<div id="information" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-dark">Informasi</h4>
      </div>
      <div class="modal-body">
        <h3 class="text-dark">Aplikasi Plaza Di Alihkan ke <a href="http://visitbpsc.web.app" target="_blank" class="text-primary">visitbpsc.web.app</a></h3>
      </div>
    </div>

  </div>
</div>
@endsection


@push('add_js')
<script>
$( document ).ready(function() {
	$('#information').modal('show');
});
</script>
@endpush
