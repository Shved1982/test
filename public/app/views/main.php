<div class="row">
	<div class="col-md-10 col-md-offset-4 opacity">
		<div id="ytapiplayer">
			You need Flash player 8+ and JavaScript enabled to view this video.
		</div><br>
		<a href="javascript:void(0);" onclick="playModal();">Увеличить</a>
	</div>
	
</div>
<script type="text/javascript">

    var params = { allowScriptAccess: "always" };
    var atts = { id: "myytplayer" };
	
    swfobject.embedSWF("http://www.youtube.com/v/rBGo6TP1DtM?enablejsapi=1&playerapiid=ytplayer&version=3",
                       "ytapiplayer", "425", "356", "8", null, null, params, atts);
	
	function onYouTubePlayerReady(playerId) {
		ytplayer = document.getElementById("myytplayer");
    }
	
	function playModal() {
		var sec = ytplayer.getCurrentTime();
		location.href = '/public/app/views/play/sec/'+sec;
	}
</script>
<hR>
<div class="row">
	<div class="col-12" >
		<ul >
			<li ng-repeat="block in blocksList.tickets | limitTo: 5" class="blocks" >
				<div>Дата вылета: {{block.date_arrival}}</div>
				<div>Цена: {{block.price}}</div>
				<div ng-show="additional" class="info">
					<div>Город вылета: {{block.city_arrival}}</div>
					<div>Город прилета: {{block.city_departure}}</div>
					<div>Самолет: {{block.plane}}</div>
				</div>
				<div class="infoShow"></div>
				<div class="infoShow" ng-mouseenter="additional=true" ng-mouseleave="additional=false"></div>
			</li>
		</ul>
	</div>
</div>
<hR>
<div class="row">
	<div class="col-md-12 col-md-offset-4" style="margin-bottom: 30px;">
		<span my-current-time="format"></span>
	</div>
</div>
<hR>
<div class="row">
	<div class="col-md-12 col-md-offset-5" style="margin-bottom: 30px;">SEARCH PANEL</div>
	
	<div class="col-md-12 col-md-offset-5">
		<input ng-hide="loading" ng-model="searchText">
		<i class="fa fa-spinner fa-pulse fa-4x" ng-show="loading"></i>
		<button ng-hide="loading"  ng-click="searching()" ng-disabled="loading">Search</button>
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-7">
		<ul ng-show="searchResult">
			<li ng-repeat="result in datalists.tickets | 
						   limitTo: itemsPerPageAdvance | 
						   filter: searchText |
						   pagination : currentPage*itemsPerPageAdvance"  class="search paginationclass">
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
	<div ng-show="searchResult" class="col-md-12 col-md-offset-7"><a href="#/search">advanced search</a></div>
</div>
