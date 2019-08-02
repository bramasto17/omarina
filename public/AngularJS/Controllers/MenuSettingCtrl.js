(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.controller('MenuSettingCtrl',function($scope,MenuSettingService){

			var vm = this;

			var filedata = new FormData();
			vm.Items = [];
			vm.txtItemName = "";
			vm.txtSmallPrice = "";
			vm.txtRegularPrice = "";
			vm.txtDescription = "";
			vm.successUpload = false;
			vm.PictureDataUpload = [];
			vm.EditPropertyName ="";
			vm.eSuccessUpload = true;
			vm.showFormAddNewItem = false;
			vm.showFormEditItem = false;
			vm.showAlertSuccessUpload = false;
			vm.showAlertErrorUpload = false;
			vm.GetUploadedFiles = GetUploadedFiles;

			vm.BtnAddNewItemClick = BtnAddNewItemClick;
			vm.BtnSaveClick = BtnSaveClick;
			vm.BtnCancelAddClick = BtnCancelAddClick;
			vm.BtnUpdateClick = BtnUpdateClick;
			vm.BtnCancelEditClick = BtnCancelEditClick;
			vm.IconEditClick = IconEditClick;
			vm.IconDeleteClick = IconDeleteClick;


			Initialize();
			//functions

			function Initialize(){
				GetAllItems();
			}
			function GetAllItems(){
				MenuSettingService.GetAllItems()
					.then(function(res){
						vm.Items = res.data;
					})
					.catch(function(err){
						console.log(err);
					});

			}

			function GetUploadedFiles($files){
				filedata = new FormData();
				vm.showAlertSuccessUpload = false;
				vm.showAlertErrorUpload = false;
	            //add additional data -> filedata.append('PictureName',PicName);
				angular.forEach($files, function (value, key) {
	                filedata.append('files', value);
	            });
	            console.log(filedata.get('files'));
	            if(filedata.get('files').type.substring(0,5) == "image" 
	            	&& filedata.get('files').size <= 2000000){
	            	//console.log(filedata.get('files'));
	            	vm.showAlertSuccessUpload = true;
	            	vm.successUpload = true;
	            	vm.eSuccessUpload = true;
	            }
	            else{
	            	filedata = new FormData();
	            	vm.showAlertErrorUpload = true;
	            	vm.successUpload = false;
	            	vm.eSuccessUpload = false;
	            }
	            $scope.$apply();
	            
			}

			function Reset(){
				vm.txtItemName = "";
				vm.txtSmallPrice = "";
				vm.txtRegularPrice = "";
				vm.txtDescription = "";
				vm.successUpload = false;
				vm.eSuccessUpload = true;
				filedata = new FormData();
				vm.EditPropertyName = "";
				vm.eItemID = "";
				vm.etxtItemName = "";
				vm.etxtSmallPrice = "";
				vm.etxtRegularPrice = "";
				vm.etxtDescription = "";
				vm.ePicture = "";
				vm.showAlertSuccessUpload = false;
				vm.showAlertErrorUpload = false;
			}


			//front-end functions

			function BtnAddNewItemClick(){
				Reset();
				vm.showFormAddNewItem = true;
				vm.showFormEditItem = false;
			}

			function BtnCancelAddClick(){
				vm.showFormAddNewItem = false;
				Reset();
			}

			function BtnCancelEditClick(){
				vm.showFormEditItem = false;
				Reset();
			}

			function BtnSaveClick(){
				filedata.append('ItemName',vm.txtItemName);
				var SaveData = {
					ItemName : vm.txtItemName,
					SmallPrice : vm.txtSmallPrice,
					RegularPrice : vm.txtRegularPrice,
					Description : vm.txtDescription,
					Picture : filedata.get('files').name
				}
				MenuSettingService.UploadPicture(filedata)
					.then(
						function successCallback(response){
						MenuSettingService.SaveNewItem(SaveData)
						 	.then(
						 	function successCallback(response) {
							    // this callback will be called asynchronously
							    // when the response is available
							    GetAllItems();
								vm.showFormAddNewItem = false;
								Reset();
							  }, 
						    function errorCallback(response) {
							    // called asynchronously if an error occurs
							    // or server returns response with an error status.
							});	

					});		
					 
			}

			function BtnUpdateClick(){
				var UpdateData = {};
				//with image upload
				if(filedata.get('files'))
				{
					filedata.append('ItemName',vm.etxtItemName);
					UpdateData = {
						ItemID : vm.eItemID,
						ItemName : vm.etxtItemName,
						SmallPrice : vm.etxtSmallPrice,
						RegularPrice : vm.etxtRegularPrice,
						Description : vm.etxtDescription,
						Picture : filedata.get('files').name
					}; 	
					MenuSettingService.UploadPicture(filedata)
					.then(
						function successCallback(response){
						MenuSettingService.UpdateItem(UpdateData)
						 	.then(
						 	function successCallback(response) {
							    // this callback will be called asynchronously
							    // when the response is available
							    GetAllItems();
								vm.showFormEditItem = false;
								Reset();
							  }, 
						    function errorCallback(response) {
							    // called asynchronously if an error occurs
							    // or server returns response with an error status.
							});	

					});		
				}
				else{ //without image upload
					UpdateData = {
						ItemID : vm.eItemID,
						ItemName : vm.etxtItemName,
						SmallPrice : vm.etxtSmallPrice,
						RegularPrice : vm.etxtRegularPrice,
						Description : vm.etxtDescription
					};

					MenuSettingService.UpdateItem(UpdateData)
						.then(function(res){
							GetAllItems();
							Reset();
						});
				}
				 
				vm.showFormEditItem = false;
				console.log(UpdateData);
			}

			function IconEditClick(Item){
				Reset();
				vm.showFormAddNewItem = false;
				vm.EditItemName = Item.ItemName;
				vm.eItemID = Item.ItemID;
				vm.etxtItemName = Item.ItemName;
				vm.etxtSmallPrice = Item.SmallPrice;
				vm.etxtRegularPrice = Item.RegularPrice;
				vm.etxtDescription = Item.Description;
				vm.ePicture = Item.Picture;
				vm.showFormEditItem = true;
			}
			function IconDeleteClick(Item){
				if(confirm("Are you sure you want to delete "+Item.ItemName+" from product list?")){
					MenuSettingService.DeleteItem(Item.ItemID)
					.then(function(){
						GetAllItems();
						vm.showFormEditItem = false;
						Reset();
					});	
				} 
				
			}




		});
})();