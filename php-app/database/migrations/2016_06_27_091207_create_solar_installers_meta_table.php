<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarInstallersMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_installers_meta', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('solar_installer_id')->unsigned()->index();
            $table->foreign('solar_installer_id')->references('id')->on('solar_installers')->onDelete('cascade');

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
        Schema::drop('solar_installers_meta');
    }
}
