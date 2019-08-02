(function (){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('LoginService',function($http){

			return{  
			  GetSession: GetSession,
			  SetSession: SetSession,
			  UnsetSession: UnsetSession
			}

			function GetSession(key){ 
			    return sessionStorage.getItem(key); 
			 }

			 function SetSession(key,val){
			 	//ex: key= 'auth',val =true
			 	return sessionStorage.setItem(key,val); 
			 }

			 function UnsetSession(key){
			 	return sessionStorage.removeItem(key);
			 }


		});

})();