<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->unique();
            $table->string('fullname')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('avatar')->default('/image/user/user.png');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('thana')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
