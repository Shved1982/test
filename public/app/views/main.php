<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<iframe width="640" height="360" src="https://www.youtube.com/embed/rBGo6TP1DtM?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<ul>
			<li ng-repeat="block in blocksList.tickets | limitTo: 5" class="blocks animation">
				<div>{{block.date_arrival}}</div>
				<div>{{block.price}}</div>
			</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<ul>
			<li ng-repeat="block in blocksList.tickets | limitTo: 5" class="blocks animation">
				<div>{{block.date_arrival}}</div>
				<div>{{block.price}}</div>
			</li>
		</ul>
	</div>
</div>
