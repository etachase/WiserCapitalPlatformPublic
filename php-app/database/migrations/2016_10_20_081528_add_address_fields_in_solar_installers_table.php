<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressFieldsInSolarInstallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solar_installers', function (Blueprint $table) {
            $table->string('address1')->after('business_location');
            $table->string('address2')->nullable()->after('address1');
            $table->string('city')->nullable()->after('address2');
            $table->string('state')->nullable()->after('city');
            $table->string('zip_code')->nullable()->after('state');
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
            $table->dropColumn('zip_code');
            $table->dropColumn('state');
            $table->dropColumn('city');
            $table->dropColumn('address2');
            $table->dropColumn('address1');
        });
    }
}
