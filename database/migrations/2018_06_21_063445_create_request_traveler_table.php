<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTravelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_traveler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->string('expected_price')->nullable();
            $table->string('referenceLink')->nullable();
            $table->string('additinoal_details', 5000)->nullable();
            $table->integer('traveler')->unsigned();
            $table->foreign('traveler')->references('id')->on('travel_schedule');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->timestamps();
            $table->integer('delete_date')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_traveler');
    }
}
