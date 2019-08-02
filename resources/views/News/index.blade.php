@extends('Layouts/master')

@section('Content')
<div ng-controller="NewsCtrl as vm">
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>News</h1>
				</div>
			</div>
		</div>
	</div>
	<div ng-cloak class="section" ng-if="vm.showList">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-4 col-sm-6" ng-repeat="news in vm.News">
	    			<div class="service-wrapper">
	        			<h3>@{{news.Title}}</h3>
		    			<hr>
		    			<p>@{{news.Content}}</p>
	        			<a href="" ng-click="vm.BtnDetailClick(news)" class="btn">Read more</a>
	        		</div>
	    		</div>
	    	</div>
	    </div>
	</div>
	<div ng-cloak class="section" ng-if="vm.showDetail">
	    <div class="container">
	    	<h3><a href="" ng-click="vm.linkBackClick()"><i class="glyphicon glyphicon-arrow-left"></i> Back to browsing</a></h3>
	    	<div class="service-wrapper">
				<div>
					<div class="news">
						<h1>@{{vm.Title}}</h1>
		    			<hr>
		    			<p>@{{vm.Content}}</p>
						<!--<h3>RESELLER NEEDED</h3>
		    			<hr>
		    			<p>Lumpia Oma Rina membuka kesempatan untuk reseller seluruh indonesia untuk permohonan bisa disampaikan via email tomy.purnama@yahoo.com</p>
		    			<a href="#" class="btn">Read more</a> -->
					</div>
	    		</div>
	    	</div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="col-md-12" style="text-align: center;">
		<h3><a href="faq">Need Help? Click here</a></h3>
	</div>
</div>
@endsection

@section("PartialScript")
	<script src="AngularJS/Controllers/NewsCtrl.js"></script>
	<script src="AngularJS/Services/NewsService.js"></script>
	
	<script type="text/javascript">
		$(function() {
			var active = $("#news");
		    active.addClass("active");
		});
	</script>
@endsection