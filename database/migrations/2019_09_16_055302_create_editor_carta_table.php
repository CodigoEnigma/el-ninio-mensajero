<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditorCartaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('editor_carta', function(Blueprint $table)
		{
			$table->char('ID_CARTA_RECIVIDA', 250);
			$table->char('ID_EDITOR', 250)->index('FK_EDITOR_CARTA2');
			$table->primary(['ID_CARTA_RECIVIDA','ID_EDITOR']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('editor_carta');
	}

}
