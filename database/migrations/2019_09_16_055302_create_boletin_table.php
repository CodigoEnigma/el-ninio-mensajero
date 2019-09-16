<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBoletinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('boletin', function(Blueprint $table)
		{
			$table->char('ID_BOLETIN', 250)->primary();
			$table->binary('TEXTO_BOLETIN');
			$table->char('AUTORES', 250);
			$table->date('FECHA_CREACION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('boletin');
	}

}
