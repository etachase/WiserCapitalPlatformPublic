<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assets', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('asset_type_id');
			$table->string('name', 100)->nullable();
			$table->string('manufacturer', 100)->nullable();
			$table->string('model', 100)->nullable();
			$table->string('data', 8192)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assets');
	}

}
