(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.controller('NewsCtrl',function($scope,NewsService){

			var vm = this;
			vm.News = [];

			vm.showList = true;
			vm.showDetail = false;
			vm.BtnDetailClick = BtnDetailClick;
			vm.linkBackClick = linkBackClick;

			Initialize();			
			function Initialize(){
				GetAllNews();
			}

			function GetAllNews(){
				NewsService.GetAllNews().then(function(res)
				{
					vm.News = res.data;
				})
			}

			function BtnDetailClick(News){
				vm.showList = false;
				vm.showDetail = true;
				vm.Title = News.Title;
				vm.Content = News.Content;
			}

			function linkBackClick(){
				vm.showList = true;
				vm.showDetail = false;
			}


		});


})();