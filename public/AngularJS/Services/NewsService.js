(function(){
	'use strict'

	angular.module('LumpiaOmarinaApp')
		.factory('NewsService',function($http,$httpParamSerializerJQLike){
			
			return {
				GetAllNews : GetAllNews,
				SaveNews : SaveNews,
				UpdateNews : UpdateNews,
				DeleteNews : DeleteNews
			}

			function GetAllNews(){
				return $http.get('api/News');
			}

			function SaveNews(News){
				return $http({
					method : 'POST',
					url : 'api/News',
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike(News)
				});
			}

			function UpdateNews(News){
				return $http({
					method : 'PUT',
					url : 'api/News/'+News.NewsID,
					headers: {'Content-Type' : 'application/x-www-form-urlencoded'},
					data : $httpParamSerializerJQLike(News)
				});
			}

			function DeleteNews(NewsID){
				return $http.delete('api/News/'+NewsID);
			}

		});


})();