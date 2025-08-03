<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_type_id');
            $table->string('name', 100);
            $table->tinyInteger('publicity_traded')->nullable();
            $table->tinyInteger('equity')->nullable();
            $table->text('yearly_sales_trend')->nullable();
            $table->tinyInteger('business_length')->nullable();
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
        Schema::drop('manufacturers');
    }
}
