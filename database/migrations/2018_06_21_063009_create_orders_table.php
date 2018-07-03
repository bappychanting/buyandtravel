<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('product_type')->unsigned();
            $table->foreign('product_type')->references('id')->on('product_types');
            $table->string('delivery_location');
            $table->string('expected_price')->nullable();
            $table->string('referenceLink')->nullable();
            $table->string('additinoal_details', 5000)->nullable();
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
