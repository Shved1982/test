'use strict';

app.controller('IndexController', ['$scope', '$rootScope', 'Tickets', '$sce','$interval','$filter',
	function($scope, $rootScope, Tickets, $sce, $interval, $filter) {
	
	$scope.blocksList = [];
	$scope.blocksList = Tickets.getBlocks();
	
	$scope.results = [];
	$scope.results = Tickets.getAll();
	
	$scope.firstPlane = {};
	$scope.firstPlane = Tickets.getfirst();
	
	$scope.additional = false;
	
	$scope.size = 5;
	$scope.sizeSearching = 10;
	
	$scope.searchResult = false;
		
	$scope.loading = true;
	
	$scope.datalists = [];
	$scope.datalists = Tickets.getBlocks();
	
	$scope.itemsPerPage = 5;
	$scope.itemsPerPageAdvance = 10;
	
	$scope.currentPage = 0;

	$rootScope.$on('first:updated', function() {
	
		$interval(function(){ 
			$scope.time = $filter('date')($scope.firstPlane,"ddhh:mm:ss a", 'UTC')
		},1000,0,null);
	});

	$rootScope.$on('block:loaded', function() {
		if ($scope.blocksList.length === 0) 
		{
			$scope.blocksList = Tickets.getBlocks();
			$scope.datalists = $scope.blocksList;
		}
		
		if ($scope.results.length === 0) 
		{
			$scope.results = Tickets.getBlocks();
			$scope.loading = false;
			$scope.datalists = $scope.results;
		}
		
	});
	
	$rootScope.$on('ticket:loaded', function() {
		if ($scope.results.length === 0) 
		{
			$scope.results = Tickets.getAll();
		}
		$scope.datalists = $scope.results;
			$scope.loading = false;
	});

	
	$scope.searching = function() 
	{
		if ($scope.blocksList.length === 0) 
		{
			$scope.blocksList = Tickets.getBlocks();
		}
		$scope.datalists = $scope.blocksList;
		$scope.searchResult = true;
	}
	
	$scope.range = function() {
		var rangeSize = 4;
		var ps = [];
		var start;
		start = $scope.currentPage;
		
		if ( start > $scope.pageCount()-rangeSize ) {
			start = $scope.pageCount()-rangeSize+1;
		}
		for (var i=start; i<start+rangeSize; i++) {
			if(i >= 0){
			ps.push(i);
			}
		}
		return ps;
	};
	
	$scope.prevPage = function() {
		if ($scope.currentPage > 0) {
			$scope.currentPage--;
		}
	};
	
	$scope.DisablePrevPage = function() {
		return $scope.currentPage === 0 ? "disabled" : "";
	};
	
	$scope.pageCount = function() {
	
		return Math.ceil($scope.datalists.length/$scope.itemsPerPageAdvance);
	};
	
	$scope.nextPage = function() {
			$scope.currentPage++;
	};
	
	$scope.DisableNextPage = function() {
		return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
	};

	$scope.setPage = function(n) {
		$scope.currentPage = n;
	};
	
	$scope.highlight = function(text, search) {
		var textString = text.toString();
		var searchString = search.toString();
		if (!searchString) {
			return $sce.trustAsHtml(textString);
		}
		//return $sce.trustAsHtml(textString.replace(new RegExp(searchString, 'gi'), '<span class="highlightedText">$&</span>'));
	};
}]);

app.filter('pagination', function()
{
  return function(input, start) {
    start = parseInt(start, 10);
    return input.slice(start);
  };
});