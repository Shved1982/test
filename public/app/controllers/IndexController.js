'use strict';

app.controller('IndexController', ['$scope', '$rootScope', 'Tickets', 
	function($scope, $rootScope, Tickets) {
	
	$scope.blocksList = [];
	
	$scope.blocksList = Tickets.getBlocks();
	
	
	$rootScope.$on('block:loaded', function() {
		if ($scope.blocksList.length === 0) 
		{
			$scope.blocksList = Tickets.getBlocks();
		}
	});

	$scope._Index = 0;
	$scope.isActive = function (index) {
		return $scope._Index === index;
	};
	
	$scope.showPhoto = function (index) {
	        $scope._Index = index;
	    };

	
	$scope.isEmpty = function() 
	{
		if ($scope.blocksList.length === 0) 
		{
			return true;
		}
		return false;
	}
}]);