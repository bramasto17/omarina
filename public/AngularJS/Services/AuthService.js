(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('AuthService',function($http){

			return {
				Authenticate : Authenticate
			};

			function Authenticate(Credentials){
				return $http({
					method : 'POST',
					url : 'api/Auth/login',
					params : Credentials
				});
			}

		});
})();