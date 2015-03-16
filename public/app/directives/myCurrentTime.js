app.directive('myCurrentTime', ['$interval', 'dateFilter', 'Tickets', '$filter',
      function($interval, dateFilter, Tickets, $filter) {
        
        return function(scope, element, attrs) {
          var format,  
              stopTime; 
		  var  firstDate = Tickets.getfirst();

          
          function updateTime() {
			firstDate = firstDate-1;
            element.text($filter('dateFormater')(firstDate));
          }

          
          scope.$watch(attrs.myCurrentTime, function(value) {
            format = value;
            updateTime();
          });

          stopTime = $interval(updateTime, 1000);

          element.on('$destroy', function() {
            $interval.cancel(stopTime);
          });
        }
      }]);