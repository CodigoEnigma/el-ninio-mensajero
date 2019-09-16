<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEditorBoletinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('editor_boletin', function(Blueprint $table)
		{
			$table->foreign('ID_BOLETIN', 'FK_EDITOR_BOLETIN')->references('ID_BOLETIN')->on('boletin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ID_EDITOR', 'FK_EDITOR_BOLETIN2')->references('ID_EDITOR')->on('editor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('editor_boletin', function(Blueprint $table)
		{
			$table->dropForeign('FK_EDITOR_BOLETIN');
			$table->dropForeign('FK_EDITOR_BOLETIN2');
		});
	}

}
