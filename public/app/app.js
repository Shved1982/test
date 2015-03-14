var app = angular.module('test', ["ngRoute"]);

	app.config(['$routeProvider', function($routeProvider) {
		$routeProvider.when('/', {
			templateUrl: '/partials/index.php',
			controller: 'TicketsController'
		});
		$routeProvider.when('/search', {
			templateUrl: '/partials/search.php',
			controller: 'SearchController'
		});
		$routeProvider.when('/ticket/:placeId', {
			templateUrl: '/partials/view.php',
			controller: 'ViewController'
		});
		$routeProvider.when('/play', {
			templateUrl: '/partials/play.php',
			controller: 'PlayController'
		});
		$routeProvider.otherwise({
			redirectTo: '/'
		});
}]);
