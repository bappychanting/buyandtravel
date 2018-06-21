<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTravelerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_traveler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('report_details', 5000);
            $table->integer('traveler_id')->unsigned();
            $table->foreign('traveler_id')->references('id')->on('travel_schedule');
            $table->integer('reporting_user_id')->unsigned();
            $table->foreign('reporting_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('report_traveler');
    }
}
