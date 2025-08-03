<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEntityTypeToSolarInstallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('solar_installers', function (Blueprint $table) {
            $table->string('entity_type')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solar_installers', function (Blueprint $table) {
            $table->dropColumn('entity_type');
        });
    }
}
