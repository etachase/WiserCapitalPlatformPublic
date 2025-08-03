<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignKeyInCompaniesMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies_meta', function (Blueprint $table) { 
            $table->integer('company_id')->unsigned()->index()->change();  
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies_meta', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });
        Schema::table('companies_meta', function (Blueprint $table) {
            $table->integer('company_id')->change();
        });
    }
}
