<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('following_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('following_user')->unsigned();
            $table->foreign('following_user')->references('id')->on('users');
            $table->integer('followed_user')->unsigned();
            $table->foreign('followed_user')->references('id')->on('users');
            $table->string('token');
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
        Schema::dropIfExists('following_users');
    }
}
