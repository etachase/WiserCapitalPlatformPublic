<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_user', function(Blueprint $table)
		{
			$table->integer('portfolio_id')->unsigned();
			$table->integer('user_id')->unsigned()->index('fk_userx_idx');
			$table->timestamps();
			$table->primary(['portfolio_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfolio_user');
	}

}
