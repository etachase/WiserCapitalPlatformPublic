<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	 public function up()
    {
        Schema::create('assets_meta', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('asset_id')->unsigned()->index();
        $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
		$table->string('type')->default('null');

        $table->string('key')->index();
        $table->text('value')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('assets_meta');
    }
}
