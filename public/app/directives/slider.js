app.directive('slider', function($timeout, Products) {
	return {
		restrict: 'AE',
		replace: true,
		scope: {
			//sliderproducts: '@sliderproducts'
		},
		link: function(scope, elem, attrs) {
		
			scope.currentIndex = 0; // Initially the index is at the first image
			
			console.log(scope);
			function initialize() {
				var i = scope.currentIndex;
				scope.sliderproducts = Products.getFirst();
				angular.forEach(scope.sliderproducts, function(sliderProduct, key) {
					if(i < scope.currentIndex + 5)
					{
						sliderProduct.visible = true;
					}
					sliderProduct.visible = false;
					i++;
				});
			}
			
			if(scope.sliderproducts === null)
			{
				initialize();
			}
			
			scope.next = function() {
				scope.currentIndex < scope.sliderproducts.length - 1 ? scope.currentIndex++ : scope.currentIndex = 0;
			};
			
			scope.getslide= function(index) {
				scope.currentIndex = index;
			};
			
			
			scope.$watch('currentIndex', function() {
				var i = scope.currentIndex;
				angular.forEach(scope.sliderproducts, function(sliderProduct, key) {
					if(i < scope.currentIndex + 5)
					{
						sliderProduct.visible = true;
					}
					sliderProduct.visible = false;
					i++;
				});
			});
			
			var timer;
			var sliderFunc = function() {
				timer = $timeout(function() {
						scope.next();
						timer = $timeout(sliderFunc, 5000);
					}, 5000);
			};
			
			sliderFunc();
			
			scope.$on('$destroy', function() {
				$timeout.cancel(timer); // when the scope is getting destroyed, cancel the timer
			});
		},
			templateUrl: '/admin/storegifts/Ajaxstoregifts/slider'
		};
});