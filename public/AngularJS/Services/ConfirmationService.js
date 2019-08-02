(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.factory('ConfirmationService',function($http,$httpParamSerializerJQLike){
			
			return {
				SaveConfirmation : SaveConfirmation
			}

			function SaveConfirmation(Confirmation){
			return $http({
				method : 'POST',
				url : 'api/Confirmation',
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
				data : $httpParamSerializerJQLike(Confirmation)
			});
		}

		});


})();