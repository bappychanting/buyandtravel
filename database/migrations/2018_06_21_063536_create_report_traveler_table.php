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
            $table->text('report_details');
            $table->integer('traveler_id')->unsigned();
            $table->foreign('traveler_id')->references('id')->on('travel_schedules');
            $table->integer('reporting_user_id')->unsigned();
            $table->foreign('reporting_user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
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
