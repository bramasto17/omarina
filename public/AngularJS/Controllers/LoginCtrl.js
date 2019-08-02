(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.controller('LoginCtrl',function($scope,$http,$window,
			AuthService,
			SessionService){

			var vm = this;

			vm.BtnSignInClick = BtnSignInClick;

			function BtnSignInClick(){
				var LoginData = {
					name : vm.txtUsername,
					password : vm.txtPassword
				};

				AuthService.Authenticate(LoginData)
					.then(function(res){
						 if(res.data.id){ 
						 	console.log(res.data)
						 	SessionService.SetSession('User',angular.toJson(res.data));
						    $window.location.href = '/Omarina/public/admin/TransactionSetting';
						    //root is relative to laravel root, not html base tag
						  } else { 
						    alert('Wrong login information!'); 
						    vm.txtPassword = '';
						    vm.txtUsername = '';
						  }; 
					});
			}



		});


})();