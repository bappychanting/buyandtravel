<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message_body', 5000);
            $table->integer('request')->unsigned();
            $table->foreign('request')->references('id')->on('request_traveler');
            $table->integer('sender')->unsigned();
            $table->foreign('sender')->references('id')->on('users');
            $table->integer('seen')->unsigned()->nullable();
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
        Schema::dropIfExists('request_message');
    }
}
