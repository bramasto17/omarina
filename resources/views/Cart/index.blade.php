@extends('Layouts/master')

@section('Content')
<div ng-controller="CartCtrl as vm">
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Order Cart</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">

		    	<div ng-if="vm.Cart.length==0">
		    		@include('Cart/nocart')
		    	</div>

		    	<div ng-if="vm.Cart.length>0">
				<div class="row">
					<div class="col-md-12">
						<!-- Action Buttons -->
						<div class="pull-right">
							<a href="cart/order" class="btn" 
								ng-disabled="vm.GrandTotal==0"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Shopping Cart Items -->
						<table class="shopping-cart">
							<!-- Shopping Cart Item -->
							<tr ng-repeat="product in vm.Cart">
								<!-- Shopping Cart Item Image -->
								<td class="image"><a href="page-product-details.html"><img ng-src="Assets/img/product/@{{product.ItemName}}/@{{product.Picture}}" alt="Item Name" height="100px"></a></td>
								<!-- Shopping Cart Item Description & Features -->
								<td>
									<div class="cart-item-title">
									<a href="page-product-details.html"><b>@{{product.ItemName}}</b></a></div>
									<div class="feature color">
										@{{product.Type}}
									</div>
									<div class="feature">Package: <b>@{{product.Package}} pcs/pack</b></div>
									<div class="feature">Ukuran: <b>@{{product.Size}}</b></div>
									<div class="feature">Rp @{{product.ItemPrice}} /pcs</div>
								</td>
								<!-- Shopping Cart Item Quantity -->
								<td class="quantity">
									<input class="form-control input-md input-micro" type="number" 
									ng-model="product.Quantity"
									min="1"
									ng-disabled="vm.disableAllInput">
								</td>
								<!-- Shopping Cart Item Price -->
								<td class="price">Rp. @{{product.Package * product.Quantity * product.ItemPrice}}</td>
								<!-- Shopping Cart Item Actions -->
								<td class="actions">
									<a class="btn btn-md btn-grey"
									ng-click="vm.IconRemoveClick($index)"
									ng-disabled="vm.disableAllInput"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
							<!-- End Shopping Cart Item -->
					
							
						</table>
						<!-- End Shopping Cart Items -->
					</div>
				</div>
				<div class="row">
					<!-- Promotion Code -->
					<div class="col-md-4  col-md-offset-0 col-sm-6 col-sm-offset-6">
					</div>
					<!-- Shipment Options -->
					<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
{{-- 						<div class="cart-shippment-options">
							<h6><i class="glyphicon glyphicon-plane"></i> Delivery options</h6>
							<div class="input-append">
								<select class="form-control input-sm">
									<option value="1">Standard - FREE</option>
									<option value="2">Next day delivery - $10.00</option>
								</select>
							</div>
						</div> --}}
					</div>
					
					<!-- Shopping Cart Totals -->
					
						<div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-6">
							<div ng-if="vm.GrandTotal!=0">
							<table class="cart-totals">
								<tr class="cart-grand-total">
									<td><b>Total</b></td>
									<td><b>Rp @{{vm.GrandTotal}}</b></td>
								</tr>
								<tr>
									<td></td>
									<td><b>* Harga belum termasuk pengiriman</b></td>
								</tr>
							</table>
							</div>
							<!-- Action Buttons -->
							<div class="pull-right">
								<a class="btn btn-grey" 
								ng-click="vm.BtnConfirmClick()"
								ng-if="vm.GrandTotal==0"><i class="glyphicon glyphicon-refresh"></i> CONFIRM</a>
								<a class="btn"
								ng-click="vm.BtnCancelClick()" 
								ng-if="vm.GrandTotal!=0"><i class="glyphicon glyphicon-remove icon-white"></i> Cancel</a>
								<a href="order" class="btn" 
								ng-disabled="vm.GrandTotal==0"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> CHECK OUT</a>
							</div>
						</div>
				</div><!--row-->

			</div><!--ng if-->
		</div><!--container-->
		</div><!--section-->
</div>
@endsection

@section('PartialScript')
	<script src="AngularJS/Controllers/CartCtrl.js"></script>
	<script src="AngularJS/Services/CartService.js"></script>
@endsection