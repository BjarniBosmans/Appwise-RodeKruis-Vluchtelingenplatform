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
            $table->integer('total_ticks')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('picture')->nullable();
            $table->integer('cards')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('kind');
            $table->integer('refugee_id')->unique();
            $table->integer('ticks')->default(0);
            $table->integer('max_ticks');
            $table->string('reward')->unique();
            $table->boolean('completed')->default(false);
            $table->boolean('reward_delivered')->default(false);
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
