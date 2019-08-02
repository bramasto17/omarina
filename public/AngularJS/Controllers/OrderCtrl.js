(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.controller('OrderCtrl',function($window,CartService,OrderService){

			var vm = this;
			var DetailTransaction = [];
			vm.showSuccess = false;
			vm.showFailed = false;
			vm.showInvoice = true;
			vm.GrandTotal = 0;
			vm.BtnVerifyClick = BtnVerifyClick;
			vm.BtnOrderClick = BtnOrderClick;
			vm.BtnSelesaiClick = BtnSelesaiClick;
			vm.Cart = [];

			Initialize();

			function Initialize(){
				GetCart();
			}

			function GetCart(){
				vm.Cart = CartService.GetCart("Cart");
				//console.log(vm.Cart);
			}

			function BtnVerifyClick(){
					var CheckOutCart = angular.copy(vm.Cart);

					angular.forEach(CheckOutCart,function(x){
						vm.GrandTotal = vm.GrandTotal + x.TotalPrice;
					});
			}

			function BtnOrderClick(){
				var TransactionID = GenerateTransactionID();
				SaveTransaction(TransactionID);
			}

			function GenerateTransactionID() {
				var currentTime = new Date();
				var month = (currentTime.getMonth() + 1).toString();
				var day = currentTime.getDate().toString();
				var year = currentTime.getFullYear().toString().substring(2);

			  var text = year+day+month;
			  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

			  for (var i = 0; i < 5; i++)
			    text += possible.charAt(Math.floor(Math.random() * possible.length));

			  return text;
			}

			function SaveTransaction(TransactionID){
				var Transaction = {
					TransactionID : TransactionID,
					Status : "Order Masuk",
					CustomerName: vm.txtName,
					CustomerEmail: vm.txtEmail,
					Phone : vm.txtPhone,
					Address : vm.txtAddress,
					City : vm.txtCity,
					Province : vm.txtProvince,
					Postcode : vm.txtPostcode,
					Delivery : 0,
					GrandTotal : vm.GrandTotal
				}
				console.log(Transaction);
				OrderService.SaveTransaction(Transaction)
					.then(
						function successCallback(response) {
							SaveDetailTransaction(TransactionID);	    
					  	}, 
					    function errorCallback(response) {
					    	vm.showInvoice = false;
					    	vm.showFailed = true;
						});
			}

			function SaveDetailTransaction(TransactionID){
				var CheckOutCart = angular.copy(vm.Cart);
				DetailTransaction = CheckOutCart.map(function(x){
						return {
							TransactionID : TransactionID,
							ItemID : x.ItemID,
							Type : x.Type,
							Size : x.Size,
							Package : x.Package,
							ItemPrice: x.ItemPrice,
							Quantity: x.Quantity,
							TotalPrice : x.TotalPrice
						};
					});
				console.log(DetailTransaction);
				OrderService.SaveDetailTransaction(DetailTransaction)
					.then(
						function successCallback(response) {
							 CartService.RemoveCart();    
							 vm.Cart=[];
							 vm.showInvoice = false;
							 vm.showSuccess = true;
					  	}, 
					    function errorCallback(response) {
					    	vm.showInvoice = false;
							 vm.showFailed = true;
						}
						);
				
			}

			function BtnSelesaiClick(){
				$window.location.href = '/Omarina/public/';
			    //root is relative to laravel root, not html base tag
			}

		});
})();