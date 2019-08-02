(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.controller('ConfirmationCtrl',function($scope,ConfirmationService){

			var vm = this;
			vm.showSuccess = false;
			vm.showFailed = false;
			vm.showForm = true;
			vm.linkBackClick = linkBackClick;
			vm.BtnConfirmClick = BtnConfirmClick;

			function BtnConfirmClick(){
				var SaveData = {
					TransactionID : vm.txtTransactionID,
					BankTo : vm.ddlBankTo,
					BankFrom : vm.txtBankFrom,
					SenderAccount : vm.txtBankSender,
					AccountName : vm.txtAccountName
				}

				ConfirmationService.SaveConfirmation(SaveData)
				 	.then(
				 	function successCallback(response) {
						vm.showSuccess = true;
					  }, 
				    function errorCallback(response) {
					    vm.showFailed = true;
					});
				vm.showForm = false;
				
			}

			function linkBackClick(){
				vm.showFailed = false;
				vm.showSuccess = false;
				vm.showForm = true;
			}


		});
})();