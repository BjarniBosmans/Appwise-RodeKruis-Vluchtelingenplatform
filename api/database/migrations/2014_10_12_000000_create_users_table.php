<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('password');
            $table->string('unique_code')->nullable()->unique();
            $table->integer('total_ticks')->default(0)->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('picture')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('refugee_id');
            $table->foreign('refugee_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ticks')->default(0);
            $table->integer('total_ticks')->default(0);
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table){
           $table->id();
            $table->string('kind')->unique();
            $table->unsignedBigInteger('card_id')->unique();
            $table->integer('ticks')->default(0);
            $table->integer('max_ticks')->default(0);
            $table->string('reward');
            $table->boolean('completed')->default(false);
            $table->boolean('reward_delivered')->default(false);
           $table->timestamps();
           $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
        });
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('kind')->unique();
            $table->string('reward');
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
        Schema::dropIfExists('users');
    }
}
