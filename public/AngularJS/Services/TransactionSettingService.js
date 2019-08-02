(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('TransactionSettingService',function($http,$httpParamSerializerJQLike){
			return {
				GetTransactionByStatus : GetTransactionByStatus,
				GetDetailTransaction : GetDetailTransaction,
				UpdateTransaction : UpdateTransaction,
				DeleteTransaction : DeleteTransaction
			};

			function GetTransactionByStatus(Status){
				return $http.get('api/TransactionSetting/'+Status);
			}

			function GetDetailTransaction(TransactionID){
				return $http.get('api/TransactionSetting/'+TransactionID+'/edit');
			}
			function UpdateTransaction(TransactionData){
				return $http({
					method : 'PUT',
					url : 'api/TransactionSetting/'+TransactionData.TransactionID,
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike(TransactionData)
				});
			}
			function DeleteTransaction(TransactionID){
				return $http.delete('api/TransactionSetting/'+TransactionID);
			}

		});
})();