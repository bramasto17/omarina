@extends('Layouts/master')

@section('Content')
<div ng-controller="ConfirmationCtrl as vm">
	<div class="section section-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Confirmation Payment</h1>
				</div>
			</div>
		</div>
	</div>	

	<div class="section" ng-cloak>
		<div class="container">
			<div class="row setup-content" ng-if="vm.showForm">
		        <div class="col-md-12">        		
		            <div class="col-md-8 col-md-offset-2">
		            	<br>
						<div class="form-horizontal">
			                <form  role="form">
			                    <fieldset>
			                      <legend>Enter Confirmation Information</legend>
			                      <br/>
			                      <div class="form-group">
			                        <label class="col-sm-3 control-label" for="card-holder-name">Transaction ID</label>
			                        <div class="col-sm-8">
			                          <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Masukan Transaction ID" ng-model="vm.txtTransactionID" required/>
			                        </div>
			                      </div>
			                      <div class="form-group">
			                        <label class="col-sm-3 control-label" for="card-number">Bank Tujuan</label>
			                        <div class="col-sm-8">
				                        <select class="form-control input-sm" ng-model="vm.ddlBankTo">
											<option value="">Bank Tujuan</option>
											<option value="BCA">Bank BCA Acc : 2291634780 a/n Tomy Purnama</option>
											<option value="Permata">Bank Permata Acc : 4000542623 a/n Tomy Purnama</option>
										</select>
			                        </div>
			                      </div>
			                      <div class="form-group">
			                        <label class="col-sm-3 control-label" for="card-number">Bank Pengirim</label>
			                        <div class="col-sm-8">
			                         <input maxlength="100" type="text" required="required" class="form-control" placeholder="Masukan nama bank" ng-model="vm.txtBankFrom" required/>
			                        </div>
			                      </div>
			                      <div class="form-group">
			                        <label class="col-sm-3 control-label" for="card-number">Nomor Rekening Pengirim</label>
			                        <div class="col-sm-8">
			                         <input maxlength="100" type="text" required="required" class="form-control" placeholder="Nomor Rekening Pengirim" ng-model="vm.txtBankSender" required />
			                        </div>
			                      </div>
			                      <div class="form-group">
			                        <label class="col-sm-3 control-label" for="card-number">Jumlah Pembayaran</label>
			                        <div class="col-sm-8">
			                         <input maxlength="100" type="text" required="required" class="form-control" placeholder="Masukan Jumlah Pembayaran" ng-model="vm.txtAccountName" required />
			                        </div>
			                      </div>
			                    </fieldset>
			                </form>
						</div>
						<button class="btn btn-primary nextBtn btn-lg pull-right" ng-click="vm.BtnConfirmClick()" type="button" ng-disabled="!vm.txtTransactionID || !vm.ddlBankTo || !vm.txtBankFrom || !vm.txtBankSender || !vm.txtAccountName" >Confirm</button>
					</div>
				</div>
			</div>
			<div class="row setup-content" ng-if="vm.showSuccess">
				<div class="col-md-4 col-md-offset-4" style="text-align: center;">
					<img src="Assets/img/feedback/succeed.png" style="width: 100%;">
					<h3>SUCCESS</h3>
					<h4>Konfirmasi anda telah dikirim, anda akan mendapatkan email setelah pembayaran di konfirmasi oleh admin</h4>
					<h3><a href="" ng-click="vm.linkBackClick()"><i class="glyphicon glyphicon-arrow-left"></i> Back to confirmation</a></h3>
				</div>
			</div>
			<div class="row setup-content" ng-if="vm.showFailed">
				<div class="col-md-4 col-md-offset-4" style="text-align: center;">
					<img src="Assets/img/feedback/failed.png" style="width: 100%;">
					<h3>FAIL</h3>
					<h4>Konfirmasi gagal, cek kembali transaksi id anda.. jika ada masalah silahkan hubungi administrator</h4>
					<h3><a href="" ng-click="vm.linkBackClick()"><i class="glyphicon glyphicon-arrow-left"></i> Back to confirmation</a></h3>
				</div>
			</div>
		</div><!--/container-->
	</div><!--/section-->

	
</div>	
@endsection    
@section("PartialScript")
	<script src="AngularJS/Controllers/ConfirmationCtrl.js"></script>
	<script src="AngularJS/Services/ConfirmationService.js"></script>
	<script src="AngularJS/Directives/ngFiles.js"></script>

	<script type="text/javascript">
		$(function() {
			var active = $("#confirmation");
		    active.addClass("active");
		});
	</script>
@endsection