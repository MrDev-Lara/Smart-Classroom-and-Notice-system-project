<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoompostcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roompostcomments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roompost_id')->unsigned();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('teacher_id')->nullable();
            $table->string('comment');
            $table->string('date');
            $table->foreign('roompost_id')->references('id')->on('roomposts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roompostcomments');
    }
}
