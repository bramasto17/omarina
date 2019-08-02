(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.factory('ProductService',function($http){
			
			return {
				GetAllProduct : GetAllProduct
			}

			function GetAllProduct(){
				return $http.get('api/Product');
			}

		});


})();