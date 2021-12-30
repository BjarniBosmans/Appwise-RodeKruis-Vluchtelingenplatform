<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table){
            $table->id();
            $table->string('kind');
            $table->unsignedBigInteger('card_id');
            $table->integer('ticks')->default(0);
            $table->integer('max_ticks')->default(0);
            $table->string('reward');
            $table->boolean('completed')->default(false);
            $table->boolean('reward_delivered')->default(false);
            $table->timestamps();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
