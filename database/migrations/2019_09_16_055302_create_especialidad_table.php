<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEspecialidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('especialidad', function(Blueprint $table)
		{
			$table->char('ID_ESPECIALIDAD', 250)->primary();
			$table->char('ID_ADMINISTRADOR', 250)->index('FK_ADMINISTRADOR_ESPECIALIDAD');
			$table->char('NOMBRE_ESPECIALIDAD', 250);
			$table->char('APELLIDO_PATERNO_ESPECIALIDAD', 250);
			$table->char('APELLIDO_MATERNO_ESPECIALIDAD', 250)->nullable()->default('NULL');
			$table->char('NOMBRE_USUARIO_ESPECIALIDAD', 250);
			$table->char('CONTRASENIA_ESPECIALIDAD', 250);
			$table->char('ESPECIALIDAD', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('especialidad');
	}

}
