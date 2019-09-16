<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCartaRecividaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('carta_recivida', function(Blueprint $table)
		{
			$table->foreign('ID_ESPECIALIDAD', 'FK_ESPECIALIDAD_CARTA')->references('ID_ESPECIALIDAD')->on('especialidad')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('carta_recivida', function(Blueprint $table)
		{
			$table->dropForeign('FK_ESPECIALIDAD_CARTA');
		});
	}

}
