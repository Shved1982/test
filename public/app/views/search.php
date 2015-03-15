<div class="row">
	<div class="col-md-12 col-md-offset-4" style="margin-bottom: 30px;"><b>advanced search</b></div>
	<div ng-show="loading" class="col-md-12 col-md-offset-4">
		<i class="fa fa-spinner fa-pulse fa-4x"></i>
	</div>
	<div ng-hide="loading" class="col-md-12 col-md-offset-4">
		<span>Дата вылета:</span> <input ng-model="search.date_arrival"><br>
		<span>Дата прибытия:</span> <input ng-model="search.date_departure"><br>
		<span>Город вылета:</span> <input ng-model="search.city_arrival"><br>
		<span>Город прибытия:</span> <input ng-model="search.city_departure"><br>
		<span>Самолет:</span> <input ng-model="search.plane"><br>
		<span>Цена:</span> <input ng-model="search.price"><br>
	</div>
	<div ng-hide="loading" class="col-md-12 col-md-offset-4">
		<button ng-click="searching()">Search</button>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-7">
		<ul ng-show="searchResult">
			<li ng-repeat="result in datalists.tickets | 
						   pagination : currentPage*itemsPerPageAdvance | 
						   limitTo: itemsPerPageAdvance | 
						   filter:search:strict" class="search paginationclass">
				<div><span>Дата вылета:</span> {{result.date_arrival}}  <span>Дата прилета:</span> {{result.date_departure}}</div>
				<div><span>Город вылета:</span> {{result.city_arrival}}  <span>Город прилета:</span> {{result.city_departure}}</div>
				<div><span>Самолет:</span> {{result.plane}}</div>
				<div><span>Цена:</span> {{result.price}}</div>
			</li>
		</ul>
		<div class="row">
			<div class="col-md-8 col-md-offset-4">
				<div class="pagination-div" ng-show="searchResult">
					 <ul class="pagination">
						<li ng-class="DisablePrevPage()">
							<a href ng-click="prevPage()"> Prev</a>
						</li>
						<li ng-repeat="n in range()" ng-class="{active: n == currentPage}" ng-click="setPage(n)">
							  <a href>{{n+1}}</a>
						</li>
						<li ng-class="DisableNextPage()">
							  <a href ng-click="nextPage()">Next </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
	<div><i></i></div>
</div>