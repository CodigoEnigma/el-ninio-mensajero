<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartaRecividaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carta_recivida', function(Blueprint $table)
		{
			$table->char('ID_CARTA_RECIVIDA', 250)->primary();
			$table->char('ID_ESPECIALIDAD', 250)->index('FK_ESPECIALIDAD_CARTA');
			$table->binary('TEXTO_CARTA');
			$table->char('ESPECIALIDAD', 250)->nullable()->default('NULL');
			$table->char('PRIORIDAD', 5)->nullable()->default('NULL');
			$table->char('LEIDA', 5)->nullable()->default('NULL');
			$table->binary('RESPUESTA')->nullable()->default('NULL');
			$table->char('POSTULACION_BOLETIN', 5)->nullable()->default('NULL');
			$table->dateTime('FECHA_RECEPCION');
			$table->binary('IMAGEN')->nullable()->default('NULL');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('carta_recivida');
	}

}
