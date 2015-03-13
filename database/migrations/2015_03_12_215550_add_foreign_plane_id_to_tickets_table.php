<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignPlaneIdToTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tickets', function(Blueprint $table) {
            $table->index('planes_id');
            $table->foreign('planes_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');;
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
            $table->dropForeign('tickets_planes_id_foreign');
            $table->dropIndex('tickets_plane_id_index');
        });
	}

}
