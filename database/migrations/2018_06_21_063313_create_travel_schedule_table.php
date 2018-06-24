<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('city');
            $table->string('destination');
            $table->string('arrival_date');
            $table->string('leave_date');
            $table->string('tags');
            $table->integer('views')->default(0);
            $table->string('additional_details', 5000);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('travel_schedule');
    }
}
