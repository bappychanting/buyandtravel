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
            $table->tinyInteger('product_quantity')->nullable()->default(1);
            $table->string('asking_price')->nullable();
            $table->integer('delivery_date')->unsigned()->nullable();
            $table->text('additinoal_details')->nullable();
            $table->tinyInteger('accepted')->default(0);
            $table->tinyInteger('delivered')->default(0);
            $table->tinyInteger('received')->default(0);
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('offering_user_id')->unsigned();
            $table->foreign('offering_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('offers');
    }
}
