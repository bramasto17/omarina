(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.controller('TransactionSettingCtrl',function(TransactionSettingService){

			var vm = this;
			vm.shownTransactionStatus = "";
			vm.ddlStatusClick = ddlStatusClick;
			vm.Transactions = [];
			vm.DetailTransactions = [];
			vm.BtnViewClick = BtnViewClick;
			vm.BtnCancelClick = BtnCancelClick;
			vm.BtnAcceptClick = BtnAcceptClick;
			vm.BtnConfirmClick = BtnConfirmClick;

			Initialize();

			function Initialize(){
				GetTransactionByStatus("Order Masuk");
			} 

			function GetTransactionByStatus(Status){
				vm.loading = true;
				TransactionSettingService.GetTransactionByStatus(Status)
					.then(function(res){
						vm.Transactions = res.data;
						vm.shownTransactionStatus = Status;
					});
			}

			function ddlStatusClick(Status){
				GetTransactionByStatus(Status);
			}

			function BtnViewClick(Transaction){
				vm.TransactionID = Transaction.TransactionID;
				vm.CustomerName = Transaction.CustomerName;
				vm.CustomerEmail = Transaction.CustomerEmail;
				vm.Phone = Transaction.Phone;
				vm.Address = Transaction.Address;
				vm.City = Transaction.City;
				vm.Province = Transaction.Province;
				vm.Postcode = Transaction.Postcode;
				vm.OrderDate = Transaction.created_at;
				vm.Delivery = Transaction.Delivery;
				vm.GrandTotal = Transaction.GrandTotal;
				vm.BankFrom = Transaction.BankFrom;
				vm.BankTo = Transaction.BankTo;
				vm.SenderAccount = Transaction.SenderAccount;
				vm.AccountName = Transaction.AccountName;
				TransactionSettingService.GetDetailTransaction(Transaction.TransactionID)
					.then(function(res){
						vm.DetailTransactions = res.data;
					})
					.catch(function(error){
						console.log(error);
					});
			}


			function BtnCancelClick(){
				//delete
				console.log(vm.TransactionID);
			}

			function BtnAcceptClick(){
				var NewGrandTotal = vm.txtDeliveryPrice + vm.GrandTotal; 
				var TransactionData = {
					TransactionID : vm.TransactionID,
					Delivery : vm.txtDeliveryPrice,
					GrandTotal : NewGrandTotal,
					Status : "Menunggu Konfirmasi"
				}
				console.log(TransactionData);
				TransactionSettingService.UpdateTransaction(TransactionData)
					.then(function(){
						GetTransactionByStatus(vm.shownTransactionStatus);
					});
			}

			function BtnConfirmClick(){
				var TransactionData = {
					TransactionID : vm.TransactionID,
					Status : "Sedang Proses"
				}
				TransactionSettingService.UpdateTransaction(TransactionData)
					.then(function(){
						GetTransactionByStatus(vm.shownTransactionStatus);
					});
			}

			function BtnCancelClick(){
				if(confirm("Transaksi akan di hapus dari data...")){
					TransactionSettingService.DeleteTransaction(vm.TransactionID)
					.then(function(){
						GetTransactionByStatus(vm.shownTransactionStatus);
					});	
				} 
			}

		});
})();