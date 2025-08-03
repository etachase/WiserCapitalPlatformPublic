<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgreementFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreement_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agreement_id')->unsigned()->index();
            $table->string('name', 100);
            $table->string('file_name', 500);
            $table->string('sqs_file_name', 300);
            $table->timestamps();
            $table->foreign('agreement_id')->references('id')->on('agreements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agreement_files');
    }
}
