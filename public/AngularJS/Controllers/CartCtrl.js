(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.controller('CartCtrl',function($scope,CartService){

			var vm = this;
			
			vm.Cart = [];
			vm.GrandTotal = 0;
			vm.noCart = true;
			vm.IconRemoveClick = IconRemoveClick;
			vm.BtnConfirmClick = BtnConfirmClick;
			vm.BtnCancelClick = BtnCancelClick;
			vm.disableAllInput = false;

			Initialize();

			function Initialize(){
				GetCart();
			}

			function GetCart(){
				vm.Cart = CartService.GetCart("Cart");
			}

			function IconRemoveClick(index){
				vm.Cart.splice(index, 1);
				CartService.SetCart(vm.Cart);
				CartService.GetCart();
			}

			function CheckOut(CheckOutCart){
				CartService.SetCart(CheckOutCart);
			}

			function BtnConfirmClick(){
					var CheckOutCart = angular.copy(vm.Cart);
					angular.forEach(CheckOutCart,function(product){
						product.TotalPrice = product.Package * product.Quantity * product.ItemPrice;
					});
					
					angular.forEach(CheckOutCart,function(x){
						vm.GrandTotal = vm.GrandTotal + x.TotalPrice;
					});

				//console.log(vm.GrandTotal);
				CheckOut(CheckOutCart);
				vm.disableAllInput = true;
			}

			function BtnCancelClick(){
				vm.GrandTotal = 0;
				vm.disableAllInput = false;
			}
		});

})();