<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEspecialidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('especialidad', function(Blueprint $table)
		{
			$table->foreign('ID_ADMINISTRADOR', 'FK_ADMINISTRADOR_ESPECIALIDAD')->references('ID_ADMINISTRADOR')->on('administrador')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('especialidad', function(Blueprint $table)
		{
			$table->dropForeign('FK_ADMINISTRADOR_ESPECIALIDAD');
		});
	}

}
