<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model {

	public function arrivalcity()
	{
		return $this->belongsTo('Cities', 'cities_arrival_id');
	}
	
	public function departurecity()
	{
		return $this->belongsTo('Cities', 'cities_departure_id');
	}

	public function plane()
	{
		return $this->belongsTo('Planes');
	}
}
