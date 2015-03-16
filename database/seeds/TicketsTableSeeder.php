<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TicketsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tickets')->delete();

		for($i = (int)FALSE; $i < 1000; $i++)
		{
			Tickets::create(['cities_arrival_id' => rand(1,5),'cities_departure_id ' => rand(1,5), 'planes_id' => rand(1,5),'price' => rand(100,21000), 
							'date_arrival' => rand(2015,2016).'-'.rand(1,12).'-'.rand(1,28).' '.rand(1,24).':'.rand(1,59).':'.rand(1,59), 
							'date_departure' => rand(2017,2018).'-'.rand(1,12).'-'.rand(1,28).' '.rand(1,24).':'.rand(1,59).':'.rand(1,59),
							'is_active' => rand(0,1), 'img_url' => '/upload', 'email' => 'foo'.rand(1,100).'@bar.com']);
		}
    }

}
