<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsEnabledInAgreementFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agreement_files', function (Blueprint $table) {
            $table->tinyInteger('is_enabled')->default(1)->after('sqs_file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agreement_files', function (Blueprint $table) {
            $table->dropColumn('is_enabled');
        });
    }
}
