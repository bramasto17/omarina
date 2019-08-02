@extends('Layouts/master')

@section('Content')
<div ng-controller="AccountSettingCtrl as vm" ng-cloak>
			<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Account Setting</h1>
					</div>
				</div>
			</div>
		</div>

	  	<div class="container">
		  	<div class="row">
		  		<div class="col-md-3">
	                @include('Includes/navadmin')
				</div>
				<div class="col-md-9">
					<h3>Ganti Informasi Akun</h3>
					<div class="row">
						<form class="form-horizontal style-form">		
						  <div class="col-md-12 col-sm-12 col-xs-12">  
						        <div class="form-group">
						          <label class="col-md-3 col-sm-3 control-label">Old Password</label>
						          <div class="col-sm-5">
						            <input type="text" class="form-control" ng-model="vm.txtOldPassword" required>
						          </div>
						        </div>
				          </div>
				        </form>
				        <form class="form-horizontal style-form">		
						  <div class="col-md-12 col-sm-12 col-xs-12">  
						        <div class="form-group">
						          <label class="col-md-3 col-sm-3 control-label">New Password</label>
						          <div class="col-sm-5">
						            <input type="password" class="form-control" ng-model="vm.txtNewPassword" required>
						          </div>
						        </div>
				          </div>
				        </form>
				        <form class="form-horizontal style-form">		
						  <div class="col-md-12 col-sm-12 col-xs-12">  
						        <div class="form-group">
						          <label class="col-md-3 col-sm-3 control-label">Confirm Password</label>
						          <div class="col-sm-5">
						            <input type="password" class="form-control" ng-model="vm.txtConfirmPassword" required>
						          </div>
						          <label ng-if="vm.PassNotMatch" class="col-md-3 col-sm-3 control-label">Password tidak sama</label>
						        </div>
				          </div>
				        </form>
				        
				        <button ng-click="vm.BtnSaveClick()" class="btn btn-primary btn-lg"
				         		ng-disabled="!vm.txtOldPassword
				              		|| !vm.txtNewPassword
				              		|| !vm.txtConfirmPassword">
				              		Save</button> 
					</div>
					<br>
						<div ng-if="vm.showSuccess" class="alert alert-success" role="alert">
						  <strong>Sukses!</strong> Password telah diubah
						</div>
						<div ng-if="vm.showFail" class="alert alert-warning" role="alert">
						  <strong>Gagal</strong> Input password lama salah atau kesalahan pada server
						</div>
				</div>
		  	</div>
	    </div><!-- /container -->


</div>

@endsection

@section('PartialScript')
	<script src="AngularJS/Controllers/AccountSettingCtrl.js"></script>
	<script src="AngularJS/Services/AccountSettingService.js"></script>
	<script src="AngularJS/Services/SessionService.js"></script>

@endsection