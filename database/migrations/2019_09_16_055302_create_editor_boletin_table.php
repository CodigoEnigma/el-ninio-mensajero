<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEditorBoletinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('editor_boletin', function(Blueprint $table)
		{
			$table->char('ID_BOLETIN', 250);
			$table->char('ID_EDITOR', 250)->index('FK_EDITOR_BOLETIN2');
			$table->primary(['ID_BOLETIN','ID_EDITOR']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('editor_boletin');
	}

}
