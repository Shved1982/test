<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TicketsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tickets')->delete();

		for($i = (int)FALSE; $i < 1000; $i++)
		{
			Tickets::create(['cities_arrival_id' => 1,'cities_departure_id ' => 1, 'planes_id' => 2,
							'price' => 2111.58, 'date_arrival' => '2015-02-15 15:00:15', 'date_departure' => '2015-02-15 15:00:15',
							'is_active' => 1, 'img_url' => '/upload', 'email' => 'foo@bar.com']);
		}
    }

}
