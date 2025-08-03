<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioSiteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('portfolio_site', function(Blueprint $table)
		{
			$table->integer('site_id')->unsigned();
			$table->integer('portfolio_id')->unsigned()->index('fk_portfolio');
			$table->timestamps();
			$table->primary(['site_id','portfolio_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('portfolio_site');
	}

}
