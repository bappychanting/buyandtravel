<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('report_details', 5000);
            $table->integer('order')->unsigned();
            $table->foreign('order')->references('id')->on('orders');
            $table->integer('reporting_user')->unsigned();
            $table->foreign('reporting_user')->references('id')->on('users');
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
        Schema::dropIfExists('report_order');
    }
}
