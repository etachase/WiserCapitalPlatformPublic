<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIsEnabledFieldAgreements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table->dropColumn('is_enabled');
            $table->dropColumn('is_search_replace');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agreements', function (Blueprint $table) {
            $table->enum('is_enabled', [0, 1])->default(0);
            $table->enum('is_search_replace', [0, 1])->default(1);
        });
    }
}
