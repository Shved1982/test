<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCityArrivalIdAndCityDepartureIdToTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::table('tickets', function(Blueprint $table) {
            $table->index('cities_arrival_id');
            $table->index('cities_departure_id');
            $table->foreign('cities_arrival_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');;
            $table->foreign('cities_departure_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');;
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tickets', function(Blueprint $table) {
            $table->dropForeign('tickets_cities_arrival_id_foreign');
            $table->dropForeign('tickets_cities_departure_id_foreign');
            $table->dropIndex('tickets_cities_arrival_id_index');
            $table->dropIndex('tickets_cities_departure_id_index');
        });
	}

}
