app.controller('TicketsController', ['$scope', '$rootScope', 'Places', '$dialog', 'lang', 
	function($scope, $rootScope, Places, $dialog, lang) {
								
	$scope.curLang = lang;
	
	$scope.tickets = Tickets.getAll();
	
	$rootScope.$on('ticket:updated', function() {
		$scope.places = Places.getAll();
	});
	
	$scope.isEmpty = function() 
	{
		if ($scope.places.length === 0) 
		{
			return true;
		}
		return false;
	}

	$scope.delete = function(place) {
		Places.delete(place);
	}
	
	$scope.show = function(place) {
		$rootScope.$broadcast('place:show', place);
	}
}]);