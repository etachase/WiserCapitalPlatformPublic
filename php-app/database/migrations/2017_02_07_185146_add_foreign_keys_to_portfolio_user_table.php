<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPortfolioUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('portfolio_user', function(Blueprint $table)
		{
			$table->foreign('portfolio_id', 'fk_portfolio2')->references('id')->on('portfolios')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('user_id', 'fk_user2')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolio_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_portfolio2');
			$table->dropForeign('fk_user2');
		});
	}

}
