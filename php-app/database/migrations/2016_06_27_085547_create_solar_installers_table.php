<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarInstallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_installers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->unique();
            $table->string('phone');
            $table->string('website');
            $table->string('business_location');
            $table->string('type_of_license');
            $table->string('license_number');
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
        Schema::drop('solar_installers');
    }
}
