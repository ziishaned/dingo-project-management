<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('board_card')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('comment_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment');
    }
}
