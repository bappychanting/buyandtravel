<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTravelScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_travel_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->text('report_details');
            $table->integer('travel_schedule_id')->unsigned();
            $table->foreign('travel_schedule_id')->references('id')->on('travel_schedules');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('report_travel_schedule');
    }
}
