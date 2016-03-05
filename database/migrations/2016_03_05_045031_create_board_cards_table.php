<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_cards', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('board_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('list_id')->unsigned();
            
            $table->foreign('board_id')->references('id')->on('board');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('list_id')->references('id')->on('board_lists');
            
            $table->string('card_title')->unique();
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
        Schema::drop('board_cards');
    }
}
