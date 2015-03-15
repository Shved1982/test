<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function() {
	return View::make('index');
});

Route::get('/public/app/views/main.php', function() {
	return View::make('main');
});

Route::get('/public/app/views/mainyoutube.php', function() {
	return View::make('mainyoutube');
});

 Route::get('/ticketsList', function () {
	
	$tickets = App\Tickets::active()->orderBy('date_arrival', 'desc')->get()->toArray();
	
	return Response::json(['status' => 200, 'tickets' => $tickets]);
});
	
Route::get('/ticketsBlocks', function () {
	
	$tickets = App\Tickets::blocks()->orderBy('date_arrival', 'desc')->get();
	
	$result = array();
	foreach($tickets as $ticket)
	{
		$result[]=[
			'id' => $ticket->id,
			'city_arrival' => $ticket->arrivalcity->name,
			'city_departure' => $ticket->departurecity->name,
			'plane' => $ticket->plane->name,
			'price' => $ticket->price,
			'date_arrival' => $ticket->date_arrival,
			'date_departure' => $ticket->date_departure,
			'img_url' => $ticket->img_url,
		];
	}
	
	return Response::json(['status' => 200, 'tickets' => $result]);
});