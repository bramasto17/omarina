(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('CartService',function($window){
			
			
        return {
			  GetCart: GetCart,
			  SetCart: SetCart,
			  RemoveCart: RemoveCart,
			  GetOrderData: GetOrderData,
			  SetOrderData: SetOrderData,
			  RemoveOrderData: RemoveOrderData
		  }

		  function GetCart() {
			    if ($window.sessionStorage ["Cart"]) {
			      var cart = angular.fromJson($window.sessionStorage ["Cart"]);
			      return cart;
			    }
			    return [];
		  }

		  function SetCart(val) {
			    if (val === undefined) {
			      $window.sessionStorage.removeItem("Cart");
			    } else {
			       $window.sessionStorage ["Cart"] = angular.toJson(val);
			    }
			    return $window.sessionStorage ["Cart"];
	      }

	      function RemoveCart(){
			  	$window.sessionStorage.removeItem('Cart');
		  }

		  function GetOrderData(){
		  		if ($window.sessionStorage ["OrderData"]) {
			      var OrderData = angular.fromJson($window.sessionStorage ["OrderData"]);
			      return OrderData;
			    }
			    return [];
		  }

		  function SetOrderData(){
		  		if (val === undefined) {
			      $window.sessionStorage .removeItem("OrderData");
			    } else {
			       $window.sessionStorage ["OrderData"] = angular.toJson(val);
			    }
			    return $window.sessionStorage ["OrderData"];
		  }

		  function RemoveOrderData(){
		  		$window.sessionStorage.removeItem('OrderData');
		  }
		});

})();