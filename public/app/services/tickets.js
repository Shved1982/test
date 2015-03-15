app.factory('Tickets', ['$http', '$rootScope', function($http, $rootScope) {
	
	var tickets = [];
	var blocks = [];
	
	function getPlaces() {
		$http({method: 'GET', url: '/ticketsList'})
			.success(function(data, status, headers, config) {
				tickets = data;
				$rootScope.$broadcast('ticket:loaded');
			})
			.error(function(data, status, headers, config) {
				console.log(data);
			});
	}
	
	function getBlocks() {
		$http({method: 'GET', url: '/ticketsBlocks'})
			.success(function(data, status, headers, config) {
				blocks = data;
				$rootScope.$broadcast('block:loaded');
				
			})
			.error(function(data, status, headers, config) {
				console.log(data);
			});

		return blocks;
	}
	
	getPlaces();
	getBlocks();
	
	var service = {};
	
	service.getAll = function() {
		return tickets;
	}
	
	service.getBlocks = function() {
		return blocks;
	}
	
	
	service.get = function(id) {
		var ticket = null;
		angular.forEach(tickets, function(value) {
			if (parseInt(value.id) === parseInt(id)) {
				ticket = value;
				return false;
			}
		});
		return ticket;
	}
	
	var searchResult = [];
	
	service.searching = function(value) {
		$http({method: 'POST', url: '/ticketsFirst', data: value})
			.success(function(data, status, headers, config) {
				searchResult = data;
				$rootScope.$broadcast('search:updated');
			})
			.error(function(data, status, headers, config) {
				console.log(data);
			});
		return searchResult;
	}
	
	var firstTicket = {};
	
	service.getfirst = function() {
		$http({method: 'GET', url: '/ticketsFirst'})
			.success(function(data, status, headers, config) {
				firstTicket = data;
				$rootScope.$broadcast('first:updated');
			})
			.error(function(data, status, headers, config) {
				console.log(data);
			});
		return firstTicket;
	}
	
	return service;
}]);