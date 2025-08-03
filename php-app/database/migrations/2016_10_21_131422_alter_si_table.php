<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solar_installers', function ($table) {
            $table->renameColumn('address1', 'address');
            $table->renameColumn('company_name', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('solar_installers', function ($table) {
            $table->renameColumn('address', 'address1');
            $table->renameColumn('name', 'company_name');
        });
    }
}
