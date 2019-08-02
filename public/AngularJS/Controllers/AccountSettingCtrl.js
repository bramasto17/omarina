(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.controller('AccountSettingCtrl',function(AccountSettingService,SessionService){

			var vm = this;

			vm.BtnSaveClick = BtnSaveClick;
			vm.showSuccess = false;
			vm.showFail = false;
			vm.PassNotMatch = false;	

			var CurrentUser = {};
			Initialize();
			function Initialize(){
				GetCurrentUserFromSession();
			}

			function GetCurrentUserFromSession(){
				CurrentUser = angular.fromJson(SessionService.GetSession('User'));
			}
			function BtnSaveClick(){
				if(vm.txtNewPassword != vm.txtConfirmPassword){
					vm.PassNotMatch = true;
				}else{
					var SaveData = {
						id : CurrentUser.id,
						email : CurrentUser.email,
						OldPassword : vm.txtOldPassword,
						NewPassword : vm.txtNewPassword
					}
					AccountSettingService.ChangeAccountInformation(SaveData)
						.then(function(response){
							vm.showSuccess = true;
							vm.showSuccess = false;
					     	Reset();
						})
						.catch(function(response){
							vm.showFail = true;
							vm.showSuccess = false;
					    	 Reset();
						});
				}
			}

			function Reset(){
				vm.txtNewPassword = "";
				vm.txtOldPassword = "";
				vm.txtConfirmPassword = "";
				vm.PassNotMatch = false;
			}

		});
})();