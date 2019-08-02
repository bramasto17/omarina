(function(){
	'use strict'
	angular.module('LumpiaOmarinaApp')
		.factory('MenuSettingService',function($http,$httpParamSerializerJQLike){

			return {
				GetAllItems : GetAllItems,
				GetItemByItemID : GetItemByItemID,
				SaveNewItem : SaveNewItem,
				UpdateItem : UpdateItem,
				DeleteItem : DeleteItem,
				UploadPicture : UploadPicture
			};

		function GetAllItems(){
			return $http.get('api/MenuSettingRes');
		}

		function GetItemByItemID(ItemID){
			return $http.get('api/MenuSettingRes/'+ItemID);
		}

		function SaveNewItem(NewItemData){
			return $http({
				method : 'POST',
				url : 'api/MenuSettingRes',
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
				data : $httpParamSerializerJQLike(NewItemData)
			});
		}

		function UpdateItem(UpdateItemData){
			return $http({
				method : 'PUT',
				url : 'api/MenuSettingRes/'+UpdateItemData.ItemID,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
				data : $httpParamSerializerJQLike(UpdateItemData)
			});
		}

		function DeleteItem(ItemID){
			return $http.delete('api/MenuSettingRes/'+ItemID);
		}

		function UploadPicture(Filedata){
			console.log(Filedata);
			return $http({
					method : 'POST',
					url : 'api/MenuSettingRes/upload',
					headers: {'Content-Type' : undefined},
					data : Filedata
				});
		}

		});

})();