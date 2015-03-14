app.controller('TicketsController', ['$scope', '$rootScope', 'Tickets', 
	function($scope, $rootScope, Tickets) {
	
	$scope.tickets = Tickets.getAll();
	
	$rootScope.$on('tickets:updated', function() {
		$scope.tickets = Tickets.getAll();
	});
	
	$scope.isEmpty = function() 
	{
		if ($scope.tickets.length === 0) 
		{
			return true;
		}
		return false;
	}
}]);