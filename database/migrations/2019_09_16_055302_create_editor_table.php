<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('editor', function(Blueprint $table)
		{
			$table->char('ID_EDITOR', 250)->primary();
			$table->char('ID_ADMINISTRADOR', 250)->index('FK_ADMINISTRADOR_EDITOR');
			$table->char('NOMBRE_EDITOR', 250);
			$table->char('APELLIDO_PATERNO_EDITOR', 250);
			$table->char('APELLIDO_MATERNO_EDITOR', 250)->nullable()->default('NULL');
			$table->char('NOMBRE_USUARIO_EDITOR', 250);
			$table->char('CONTRASENIA_EDITOR', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('editor');
	}

}
