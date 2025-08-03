<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPortfolioSiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('portfolio_site', function(Blueprint $table)
		{
			$table->foreign('portfolio_id', 'fk_portfolio')->references('id')->on('portfolios')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('site_id', 'fk_site')->references('id')->on('sites')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('portfolio_site', function(Blueprint $table)
		{
			$table->dropForeign('fk_portfolio');
			$table->dropForeign('fk_site');
		});
	}

}
