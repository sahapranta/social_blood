<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestAcceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_accepts', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('blood_request_id');
            $table->tinyInteger('donated')->default(0);
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('request_accepts');
    }
}
