@extends('Layouts/master')

@section('PartialCSS')
	<style type="text/css">
        .loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #f00000; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
            margin-top:80px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('Content')
<div ng-controller="ProductCtrl as vm">
	
<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Products</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="loader col-md-offset-5 col-sm-offset-5 col-xs-offset-4" ng-show="vm.loading"></div>

	    <div class="eshop-section section" ng-cloak>
	    	<div class="container">

	    		<div ng-if="vm.showCatalog">
				<div class="row">
					
					<div class="col-md-4 col-sm-6" ng-repeat="product in vm.Products">
						<div class="shop-item">
							<div class="image">
								<a href="detail">
								<img ng-src="Assets/img/product/@{{product.ItemName}}/@{{product.Picture}}" alt="Item Name" height="200px"></a>
							</div>
							<div class="title">
								<h3><a ng-click="vm.BtnDetailClick(product)">@{{product.ItemName}}</a></h3>
							</div>
							{{-- <div class="price">
								Rp. @{{product.ItemPrice}}/pcs
							</div> --}}
							<div class="actions">
								<a class="btn" ng-click="vm.BtnDetailClick(product)"><i class="icon-shopping-cart icon-white"></i> Detail</a>
							</div>
						</div>
					</div>
				
				</div>
				</div>
				<!-- <div class="pagination-wrapper ">
					<ul class="pagination pagination-lg">
						<li class="disabled"><a href="#">Previous</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<li><a href="#">10</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div> -->

				<div ng-if="vm.showDetail">
				<div class="row">
	    			<!-- Product Image & Available Colors -->
	    			<div class="col-md-12">
	    				<h3><a href="" ng-click="vm.linkBackClick()"><i class="glyphicon glyphicon-arrow-left"></i> Back to browsing</a></h3>
	    			</div>
	    			<div class="col-sm-6">
	    				<div class="product-image-large">
	    					<img src="Assets/img/product/@{{vm.ItemName}}/@{{vm.Picture}}" alt="Item Name" height="250px">
	    				</div>
	    			</div>
	    			<!-- End Product Image & Available Colors -->
	    			<!-- Product Summary & Options -->
	    			<div class="col-sm-6 product-details">
	    				<h2>@{{vm.ItemName}}</h2>
						<h4>Ukuran Kecil : Rp. @{{vm.SmallPrice}}/pcs</h4>
						<h4>Ukuran Reguler : Rp. @{{vm.RegularPrice}}/pcs</h4>
						<h5>Description</h5>
	    				<p>
	    					@{{vm.Description}}
	    				</p>
						<table class="shop-item-selections">
							<!-- Serve Selector -->
							<tr>
								<td><b>Tipe Penyajian:</b></td>
								<td>
									<div class="input-append col-sm-8">
										<select ng-model="vm.Type" class="form-control input-sm">
										<option value="">--Pilih Tipe Penyajian--</option>
											<option>Frozen/Beku</option>
											<option>Goreng</option>
										</select>
									</div>
								</td>
							</tr>
							<!-- Size Selector -->
							<tr>
								<td><b>Ukuran :</b></td>
								<td>
									<div class="input-append col-sm-8">
										<select ng-model="vm.Size" class="form-control input-sm">
											<option value="">--Pilih Ukuran--</option>
											<option>Kecil</option>
											<option>Reguler</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td><b>Package :</b></td>
								<td>
									<div class="input-append col-sm-8">
										<select ng-model="vm.Package" class="form-control input-sm">
											<option value="">--Pilih Package--</option>
											<option value="5">5 pcs/pack</option>
											<option value="10">10 pcs/pack</option>
										</select>
									</div>
								</td>
							</tr>
							<!-- Quantity -->
							<tr>
								<td><b>Jumlah Pack:</b></td>
								<td>
									<div class="input-append col-sm-8">
										<input type="number" class="form-control input-sm input-micro" 
										ng-model="vm.Quantity"
										min="1">
									</div>
									
								</td>
							</tr>
							<!-- Add to Cart Button -->
							<tr>
								<td>&nbsp;</td>
								<td>
									<div class="input-append col-sm-6">
										<a class="btn btn"
										ng-click="vm.BtnAddToCartClick()"
										ng-disabled="!vm.Type || !vm.Quantity || !vm.Package"><i class="icon-shopping-cart icon-white"></i> Add to Cart</a>
									</div>									
								</td>
							</tr>
						</table>
	    			</div>
	    			<!-- End Product Summary & Options -->
	    		</div>
	    		</div>

			</div>
	    </div>
</div>
@endsection

@section("PartialScript")
	<script src="AngularJS/Controllers/ProductCtrl.js"></script>
	<script src="AngularJS/Services/ProductService.js"></script>
	<script src="AngularJS/Services/CartService.js"></script>
	<script type="text/javascript">
		$(function() {
			var active = $("#product");
		    active.addClass("active");
		});
	</script>
@endsection