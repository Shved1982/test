'use strict';

var app = angular.module('test', ['ngRoute', 'ngAnimate', 'ngSanitize', 'timer']);

	app.config(['$routeProvider', function($routeProvider) {
	
		$routeProvider.when('/', {
			templateUrl: '/public/app/views/main.php',
			controller: 'IndexController'
		});
		$routeProvider.when('/search', {
			templateUrl: '/public/app/views/search.php',
			controller: 'IndexController'
		});
		$routeProvider.when('/ticket/:placeId', {
			templateUrl: '/public/app/views/view.php',
			controller: 'TicketsController'
		});
		$routeProvider.when('/play', {
			templateUrl: '/public/app/views/play.php',
			controller: 'PlayController'
		});
		$routeProvider.otherwise({
			redirectTo: '/'
		});
}]);
