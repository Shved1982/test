<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
	public function arrivalcity()
	{
		return $this->belongsTo('App\Cities', 'cities_arrival_id');
	}
	
	public function departurecity()
	{
		return $this->belongsTo('App\Cities', 'cities_departure_id');
	}

	public function plane()
	{
		return $this->belongsTo('App\Planes', 'planes_id');
	}
	
	public function scopeActive($query)
    {
        return $query->where('is_active', '=', (int)TRUE);
    }
	
	public function scopeBlocks($query)
    {
        return $query->where('is_active', '=', (int)TRUE)->limit(100);
    }
}
