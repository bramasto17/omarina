@extends('Layouts/master')

@section('PartialCSS')
	<style type="text/css">
			.stepwizard-step p {
			    margin-top: 10px;
			}

			.stepwizard-row {
			    display: table-row;
			}

			.stepwizard {
			    display: table;
			    width: 100%;
			    position: relative;
			}

			.stepwizard-step button[disabled] {
			    opacity: 1 !important;
			    filter: alpha(opacity=100) !important;
			}

			.stepwizard-row:before {
			    top: 14px;
			    bottom: 0;
			    position: absolute;
			    content: " ";
			    width: 100%;
			    height: 1px;
			    background-color: #ccc;
			    z-order: 0;

			}

			.stepwizard-step {
			    display: table-cell;
			    text-align: center;
			    position: relative;
			}
			.btn
			{
			        border-radius: 0px;
			}
			.btn-circle {
			       width: 56px;
			    height: 56px;
			    text-align: center;
			    padding: 12px 0;
			    font-size: 20px;
			    line-height: 1.428571429;
			    border-radius: 35px;
			    margin-top: -14px;
			    border: solid 3px #ccc !important;
			    opacity:1 !important;
			     -webkit-box-shadow:inset 0px 0px 0px 3px #fff !important; 
			     -moz-box-shadow:inset 0px 0px 0px 3px #fff !important;
			    -o-box-shadow:inset 0px 0px 0px 3px #fff !important;
			   -ms-box-shadow:inset 0px 0px 0px 3px #fff !important; 
			   box-shadow:inset 0px 0px 0px 3px #fff !important;
			      backgournd-color:#428bca;
			}


	</style>
@endsection

@section('Content')
<div ng-controller="OrderCtrl as vm">
	

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
  



	 <div class="row setup-content"">
        <div class="col-md-12">        		
            <div class="col-md-8 col-md-offset-2">
                 <br/>

                 <div class="stepwizard">
				    <div class="stepwizard-row setup-panel">
				        <div class="stepwizard-step">
				            <a href="#VerifyEmail-step" type="button" class="btn btn-success btn-circle"  disabled="disabled">
				                <span class="glyphicon glyphicon-shopping-cart"></span>
				            </a>
				            <p>Check Out</p>
				        </div>
				        <div class="stepwizard-step">
				            <a href="#ProfileSetup-step" type="button" class="btn btn-primary btn-circle">
				                <span class="glyphicon glyphicon-user"></span>
				            </a>
				            <p>Customer Setup</p>
				        </div>
				        <div class="stepwizard-step">
				            <a href="#Security-Setup-step" type="button"  class="btn btn-primary btn-circle"  disabled="disabled" id="Security-Setup-step-3">
				                <span class="glyphicon glyphicon-ok"></span>
				            </a>
				            <p>Verify Order</p>
				        </div>
				    </div>
				</div>
                <div class="form-horizontal">
                    <form  role="form">
                        <fieldset>
                      
                          <legend>Enter Customer Information</legend>
                          <br/>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="card-holder-name">Your Email</label>
                            <div class="col-sm-8">
                              <input  maxlength="100" type="email" required="required" class="form-control" placeholder="Enter Email" ng-model="vm.txtEmail" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="card-number">Name</label>
                            <div class="col-sm-8">
                             <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Name" 
                             ng-model="vm.txtName" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="card-number">Primary Phone Number</label>
                            <div class="col-sm-8">
                             <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Primary Phone Number"
                             ng-model="vm.txtPhone" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="card-number">Address</label>
                            <div class="col-sm-8">
                             <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Address" 
                             ng-model="vm.txtAddress"/>
                            </div>
                          </div>
                          <div class="col-lg-6">
                               <div class="form-group">
                                    <label class="col-sm-6 control-label" for="card-number">City</label>
                                    <div class="col-sm-6" style="padding-left:8px">
                                     <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter City" 
                                     ng-model="vm.txtCity"/>
                                    </div>
                                  </div>
                          </div>
                           <div class="col-lg-5">
                               <div class="form-group">
                                    <label class="col-sm-6 control-label" for="card-number">Province</label>
                                    <div class="col-sm-6" style="padding:0px">
                                     <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter State/Province" 
                                     ng-model="vm.txtProvince"/>
                                    </div>
                                  </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label" for="card-number">Postcode</label>
                            <div class="col-sm-8">
                             <input maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Address" 
                             ng-model="vm.txtPostcode"/>
                            </div>
                          </div>
                        </fieldset>
                    </form>
                </div>
                <button data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary nextBtn btn-lg pull-right" type="button" 
                ng-click="vm.BtnVerifyClick()"
                ng-disabled="!vm.txtEmail
                || !vm.txtName
                || !vm.txtPhone
                || !vm.txtAddress
                || !vm.txtCity
                || !vm.txtProvince
                || !vm.txtPostcode">Verify</button>
            </div>
        </div>
    </div>

    

    <!-- Large modal -->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Verify Order</h4>
	      </div>
	      <div class="modal-body">
           <div ng-if="vm.showInvoice">
    	      	<div class="row">
                  <div class="col-xs-12">
              		<div class="invoice-title">
              			<h2>Order Detail</h2>
              		</div>
              		<hr>
              		<div class="row">
              			<div class="col-xs-6">
              				<address>
              				<strong>Customer Information:</strong><br>
              					@{{vm.txtName}}<br>
              					@{{vm.txtEmail}}<br>
              					@{{vm.txtPhone}}<br>
              					@{{vm.txtAddress}}<br>
              					@{{vm.txtCity}}<br>
              					@{{vm.txtProvince}}<br>
              					@{{vm.txtPostcode}}<br>
              				</address>
              			</div>
              			<div class="col-xs-6 text-right">

              			</div>
              			<div class="col-xs-6 text-right">
                  			
              			</div>
              		</div>
              	</div>
              </div> 

            <div class="row">
            	<div class="col-md-12">
            		<div class="panel panel-default">
            			<div class="panel-heading">
            				<h3 class="panel-title"><strong>Order summary</strong></h3>
            			</div>
            			<div class="panel-body">
            				<div class="table-responsive">
            					<table class="table table-condensed">
            						<thead>
                                        <tr>
                							<td><strong>Nama</strong></td>
                							<td class="text-center"><strong>Tipe</strong></td>
                              <td class="text-center"><strong>Package</strong></td>
                							<td class="text-center"><strong>Ukuran</strong></td>
                							<td class="text-center"><strong>Harga</strong></td>
                							<td class="text-center"><strong>Jumlah</strong></td>
                							<td class="text-right"><strong>Total</strong></td>
                                        </tr>
            						</thead>
            						<tbody>
                            <tr ng-repeat="product in vm.Cart">
                							<td>@{{product.ItemName}}</td>
                							<td class="text-center">@{{product.Type}}</td>
                							<td class="text-center">@{{product.Package}} pcs/pack</td>
                              <td class="text-center">@{{product.Size}}</td>
              								<td class="text-center">@{{product.ItemPrice}}</td>
              								<td class="text-center">@{{product.Quantity}}</td>
              								<td class="text-right">Rp. @{{product.TotalPrice}}</td>
            							   </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">Rp. @{{vm.GrandTotal}}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-right">*Harga belum termasuk pengiriman</td>
                            </tr>
            						</tbody>
            					</table>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
          </div><!--show invoice-->

    <div class="row setup-content" ng-if="vm.showSuccess">
        <div class="col-md-4 col-md-offset-4" style="text-align: center;">
          <img src="Assets/img/feedback/succeed.png" style="width: 100%;">
          <h3>SUCCESS</h3>
          <h4>Pemesanan anda telah dikirim, anda akan mendapatkan email setelah admin menerima pemesanan anda</h4>
        </div>
      </div>
      <div class="row setup-content" ng-if="vm.showFailed">
        <div class="col-md-4 col-md-offset-4" style="text-align: center;">
          <img src="Assets/img/feedback/failed.png" style="width: 100%;">
          <h3>FAIL</h3>
          <h4>Pemesanan gagal, silahkan mengulang pemesanan kembali. Jika sistem bermasalah silahkan hubungi admin</h4>
        </div>
      </div>

	      </div><!--modal body-->
	      <div class="modal-footer">
          <button  type="button" class="btn btn-primary" ng-if="!vm.showInvoice" 
          ng-click="vm.BtnSelesaiClick()">Selesai</button>
	        <button type="button" class="btn btn-default" data-dismiss="modal" ng-if="vm.showInvoice">Close</button>
	        <button  type="button" class="btn btn-primary" ng-if="vm.showInvoice" 
          ng-click="vm.BtnOrderClick()"
          ng-disabled="vm.Cart.length <1 ">Order</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>
@endsection

@section('PartialScript')
    <script src="AngularJS/Controllers/OrderCtrl.js"></script>
    <script src="AngularJS/Services/OrderService.js"></script>
    <script src="AngularJS/Services/CartService.js"></script>
@endsection