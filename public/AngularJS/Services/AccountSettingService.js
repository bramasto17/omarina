(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('AccountSettingService',function($http,$httpParamSerializerJQLike){

			return {
				ChangeAccountInformation : ChangeAccountInformation

			}

			function ChangeAccountInformation(SaveData){
				return $http({
					method : 'PUT',
					url : 'api/AccountSetting/'+SaveData.id,
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike(SaveData)
				});
			}

		});

})();