@extends('Layouts/master')

@section('Content')
<!-- Homepage Slider -->
        <div class="homepage-slider">
        	<div id="sequence">
				<ul class="sequence-canvas">
					<!-- Slide 1 -->
					<li class="bg4">
						<!-- Slide Title -->
						<h2 class="title">Lumpia Oma Rina</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Start eating lumpia</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="Assets/img/homepage-slider/slide1.png" alt="Slide 1" />
					</li>
					<!-- End Slide 1 -->
					<!-- Slide 2 -->
					<li class="bg4">
						<!-- Slide Title -->
						<h2 class="title">Lumpia Oma Rina</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Start eating lumpia</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="Assets/img/homepage-slider/slide1.png" alt="Slide 1" />
					</li>
					<!-- End Slide 2 -->
					<!-- Slide 3 -->
					<li class="bg4">
						<!-- Slide Title -->
						<h2 class="title">Lumpia Oma Rina</h2>
						<!-- Slide Text -->
						<h3 class="subtitle">Start eating lumpia</h3>
						<!-- Slide Image -->
						<img class="slide-img" src="Assets/img/homepage-slider/slide1.png" alt="Slide 1" />
					</li>
					<!-- End Slide 3 -->
				</ul>
				<div class="sequence-pagination-wrapper">
					<ul class="sequence-pagination">
						<li>1</li>
						<li>2</li>
						<li>3</li>
					</ul>
				</div>
			</div>
        </div>
        <!-- End Homepage Slider -->

		<!-- Call to Action Bar -->
	    <div class="section section-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="calltoaction-wrapper">
							<div class="col-md-6 col-xs-12">
								<img src="Assets/img/lumpia.jpg" style="width: 100%;">
							</div>
							<div class="col-md-6 col-xs-12" style="margin-top: 10%;">
								<h1>Start shopping here</h1><br>
								<a href="product" class="btn btn-red">Browse Product</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Call to Action Bar -->	
		
		<div class="container">
			<div class="col-md-12" style="text-align: center;">
				<h3><a href="faq">Need Help? Click here</a></h3>
			</div>
		</div>

@endsection
@section("PartialScript")
	<script type="text/javascript">
		$(function() {
			var active = $("#home");
		    active.addClass("active");
		});
	</script>
@endsection