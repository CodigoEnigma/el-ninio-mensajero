<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEditorCartaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('editor_carta', function(Blueprint $table)
		{
			$table->foreign('ID_CARTA_RECIVIDA', 'FK_EDITOR_CARTA')->references('ID_CARTA_RECIVIDA')->on('carta_recivida')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ID_EDITOR', 'FK_EDITOR_CARTA2')->references('ID_EDITOR')->on('editor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('editor_carta', function(Blueprint $table)
		{
			$table->dropForeign('FK_EDITOR_CARTA');
			$table->dropForeign('FK_EDITOR_CARTA2');
		});
	}

}
