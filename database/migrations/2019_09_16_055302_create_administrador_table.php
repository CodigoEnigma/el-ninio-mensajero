<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministradorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('administrador', function(Blueprint $table)
		{
			$table->char('ID_ADMINISTRADOR', 250)->primary();
			$table->char('NOMBRE_ADMINISTRADOR', 250);
			$table->char('APELLIDO_PATERNO_ADMINISTRADOR', 250);
			$table->char('APELLIDO_MATERNO_ADMINISTRADOR', 250)->nullable()->default('NULL');
			$table->char('NOMBRE_USUARIO_ADMIN', 250);
			$table->char('CONTRASENIA_ADMIN', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('administrador');
	}

}
