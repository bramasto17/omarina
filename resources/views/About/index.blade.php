@extends('Layouts/master')

@section('Content')
<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>About Us</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<p>
							Lumpia Oma Rina adalah sebuah usaha rumahan yang kami kelola dengan mengutamakan kebersihan dan kualitas bahan yang kami gunakan.
							<br><br>
							Dengan pengalaman kami selama ini, kami berhasil menciptakan lumpia dengan berbagai rasa yang disesuaikan dengan kebutuhan dan permintaan pelanggan kami. Bermacam cita rasa mulai dari Lumpia dengan rasa Original/Ebi sampai kepada rasa Tempe Orek. Untuk cita rasa western kami menciptakan rasa Smoke Beef. Untuk penggemar seafood kami menyediakan rasa Tuna Pedas. Bahkan untuk para vegetarian kami menciptakan Lumpia dengan rasa Jamur yang lezat.
							<br><br>
							Kami terus berusaha untuk menciptakan berbagai rasa baru dengan inovasi-inovasi terkini agar Lumpia Oma Rina selalu menjadi yang terbaik hanya bagi Anda.
						</p>
					</div>
					<div class="col-sm-6">
						<img src="Assets/img/about.jpg" style="width: 100%;">
					</div>
				</div>
			</div>
		</div>
@endsection

@section("PartialScript")
	<script type="text/javascript">
		$(function() {
			var active = $("#about");
		    active.addClass("active");
		});
	</script>
@endsection