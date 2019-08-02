(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.factory('OrderService',function($http,$httpParamSerializerJQLike){

			return {
				SaveTransaction : SaveTransaction,
				SaveDetailTransaction : SaveDetailTransaction
			};

			function SaveTransaction(Transaction){
				return $http({
					method : 'POST',
					url : 'api/Order/SaveTransaction',
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike(Transaction)
				});
				}

			function SaveDetailTransaction(DetailTransaction){
				//detail is array -> convert to object before send to controller
				return $http({
					method : 'POST',
					url : 'api/Order/SaveDetailTransaction',
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike({ArrayData : DetailTransaction})
				});

			}

			

		});
	

})();