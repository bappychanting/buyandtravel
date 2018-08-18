<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('quantity');
            $table->string('expected_price')->nullable();
            $table->string('image')->default('default.jpg');
            $table->string('reference_link')->nullable();
            $table->text('additional_details')->nullable();
            $table->date('accepted')->nullable();
            $table->date('recieved')->nullable();
            $table->integer('travel_schedule_id')->unsigned();
            $table->foreign('travel_schedule_id')->references('id')->on('travel_schedules');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('message_subject_id')->unsigned();
            $table->foreign('message_subject_id')->references('id')->on('message_subjects');
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
        Schema::dropIfExists('requests');
    }
}
