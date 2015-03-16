'use strict';

var app = angular.module('test', ['ngRoute', 'ui.bootstrap', 'ngAnimate']);

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
		$routeProvider.when('/public/app/views/play/sec/:sec', {
			templateUrl: '/public/app/views/play.php',
			controller: 'IndexController'
		});
		$routeProvider.otherwise({
			redirectTo: '/'
		});
}]);
