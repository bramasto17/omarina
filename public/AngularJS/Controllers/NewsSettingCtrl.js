(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.controller('NewsSettingCtrl',function($scope,NewsService){

			var vm = this;

			var filedata = new FormData();
			vm.News = [];
			vm.txtTitle = "";
			vm.txtContent = "";
			vm.txtForm = "";
			vm.showFormNews = false;
			vm.showBtnAdd = false;
			vm.showBtnUpdate = false;

			vm.BtnAddNewsClick = BtnAddNewsClick;
			vm.BtnSaveClick = BtnSaveClick;
			vm.BtnCancelClick = BtnCancelClick;
			vm.BtnUpdateClick = BtnUpdateClick;
			vm.IconEditClick = IconEditClick;
			vm.IconDeleteClick = IconDeleteClick;


			Initialize();
			//functions

			function Initialize(){
				GetAllNews();
			}
			function GetAllNews(){
				NewsService.GetAllNews()
					.then(function(res){
						vm.News = res.data;
					});
			}

			function Reset(){
				vm.txtTitle = "";
				vm.txtContent = "";
			}


			//front-end functions

			function BtnAddNewsClick(){
				vm.showFormNews = true;
				vm.showBtnAdd = true;
				vm.showBtnUpdate = false;
				vm.txtForm = "Add News";
				Reset();
			}

			function BtnCancelClick(){
				vm.showFormNews = false;
				Reset();
			}

			function BtnCancelAddClick(){
				vm.showFormNews = false;
				Reset();
			}

			function BtnCancelEditClick(){
				vm.showFormNews = false;
				Reset();
			}

			function BtnSaveClick(){
				var SaveData = {
					Title : vm.txtTitle,
					Content : vm.txtContent
				}
				NewsService.SaveNews(SaveData)
				 	.then(
				 	function successCallback(response) {
					    // this callback will be called asynchronously
					    // when the response is available
					    GetAllNews();
						vm.showFormNews = false;
					  }, 
				    function errorCallback(response) {
					    // called asynchronously if an error occurs
					    // or server returns response with an error status.
					});
			}

			function BtnUpdateClick(){
				var SaveData = {
					NewsID : vm.txtID,
					Title : vm.txtTitle,
					Content : vm.txtContent
				}
				NewsService.UpdateNews(SaveData)
				 	.then(
				 	function successCallback(response) {
					    // this callback will be called asynchronously
					    // when the response is available
					    GetAllNews();
						vm.showFormNews = false;
					  }, 
				    function errorCallback(response) {
					    // called asynchronously if an error occurs
					    // or server returns response with an error status.
					});
			}

			function IconEditClick(News){
				vm.txtTitle = News.Title;
				vm.txtContent = News.Content;
				vm.txtID = News.NewsID;
				vm.showFormNews = true;
				vm.showBtnAdd = false;
				vm.showBtnUpdate = true;
				vm.txtForm = "Edit News";
			}

			function IconDeleteClick(News){
				if(confirm("Are you sure you want to delete "+News.Title+" from news list?")){
					NewsService.DeleteNews(News.NewsID)
					.then(function(){
						GetAllNews();
						vm.showFormNews = false;
					});	
				} 	
			}




		});
})();