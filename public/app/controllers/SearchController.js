app.controller('SearchController', ['$scope', '$rootScope', 'Tickets', 
	function($scope, $rootScope, Tickets) {
								
	$scope.blocksList = [];
	$scope.size = 50;
	$scope.searchResult = false;
	$scope.blocksList = Tickets.getAll();
	
	
	$rootScope.$on('block:loaded', function() {
		if ($scope.blocksList.length === 0) 
		{
			$scope.blocksList = Tickets.getAll();
		}
	});

	
	$scope.searching = function() 
	{
		if ($scope.blocksList.length === 0) 
		{
			$scope.blocksList = Tickets.getAll();
		}
		$scope.searchResult = true;
	}
	
}]);