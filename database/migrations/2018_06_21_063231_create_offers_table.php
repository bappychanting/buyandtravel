<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_quantity');
            $table->string('asking_price');
            $table->integer('delivery_date')->unsigned()->nullable();
            $table->string('additinoal_details', 5000);
            $table->tinyInteger('accepted')->default(0);
            $table->tinyInteger('delivered')->default(0);
            $table->tinyInteger('received')->default(0);
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('offering_user_id')->unsigned();
            $table->foreign('offering_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('offers');
    }
}
