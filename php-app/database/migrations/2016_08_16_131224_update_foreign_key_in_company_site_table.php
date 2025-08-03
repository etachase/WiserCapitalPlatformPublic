<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyInCompanySiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_site', function (Blueprint $table) {            
            $table->integer('company_id')->unsigned()->index()->change();      
            $table->integer('site_id')->unsigned()->index()->change();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_site', function (Blueprint $table) {
            $table->dropForeign(['site_id']);
            $table->dropForeign(['company_id']);
            //
        });
        Schema::table('company_site', function (Blueprint $table) {
            $table->integer('site_id')->change();
            $table->integer('company_id')->change();
            //
        });
    }
}
