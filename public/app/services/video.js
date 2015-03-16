app.factory('Video', ['$http', '$rootScope', function($http, $rootScope) {
	
	var videos;
	
	function getVideo() {
		$http.get('http://gdata.youtube.com/feeds/api/videos/rBGo6TP1DtM?v=2&alt=json').
			success(function(data) {
				videos = data.entry.content.src;
				
			}).error(function(data) {
				alert('cannot fetch youtube API');
		});
	}
	
	//getVideo();
	
	var service = {};
	
	service.get = function() {
		return videos;
	}
	
	return service;
}]);