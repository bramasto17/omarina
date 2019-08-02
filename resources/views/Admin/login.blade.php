@extends('Layouts/master')

@section('PartialCSS')
	<style type="text/css">
		.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

	</style>
@endsection

@section('Content')
<div id="login-page" ng-controller="LoginCtrl as vm">

			<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>

	  	<div class="container">
		  	<div class="row">
		  		<div class=" col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
	  				<div class="card card-container">
	  					<div class="col-md-6 col-sm-6 col-md-offset-2">
  							<img id="profile-img" class="profile-img-card" src="Assets/img/mPurpose-logo.png" />	
	  					</div>
			            
			            <p id="profile-name" class="profile-name-card"></p>
			            <form class="form-signin">
			                <input type="text" class="form-control" placeholder="Username" required autofocus ng-model="vm.txtUsername">
			                <input type="password" class="form-control" placeholder="Password" required ng-model="vm.txtPassword">
			                <button ng-click="vm.BtnSignInClick()" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
			            </form><!-- /form -->
			        </div><!-- /card-container -->

		  		</div>
		  	</div>
	    </div><!-- /container -->




</div>

@endsection
@section('PartialScript')
	<script src="AngularJS/Controllers/LoginCtrl.js"></script>
  	<script src="AngularJS/Services/AuthService.js"></script>
  	<script src="AngularJS/Services/SessionService.js"></script>


@endsection