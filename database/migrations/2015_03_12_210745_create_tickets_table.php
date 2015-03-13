<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function($t){
			$t->increments('id');
			$t->tinyInteger('cities_arrival_id')->unsigned();
			$t->tinyInteger('cities_departure_id')->unsigned();
			$t->tinyInteger('planes_id')->unsigned();
			$t->decimal('price', 15, 2);
			$t->dateTime('date_arrival');
			$t->dateTime('date_departure');
			$t->tinyInteger('is_active');
			$t->string('img_url', 200);                    
			$t->timestamps();   
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tickets');
	}

}
