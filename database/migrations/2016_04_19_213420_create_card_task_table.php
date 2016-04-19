<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_task', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('card_id')->unsigned();
            $table->foreign('card_id')->references('id')->on('board_card')->onDelete('cascade');

            $table->string('task_title');
            $table->boolean('is_completed');
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
        Schema::drop('card_task');
    }
}
