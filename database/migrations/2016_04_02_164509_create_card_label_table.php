<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardLabelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_label', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('board_cards')->onDelete('cascade');

            $table->string('label_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('card_label');
    }
}
