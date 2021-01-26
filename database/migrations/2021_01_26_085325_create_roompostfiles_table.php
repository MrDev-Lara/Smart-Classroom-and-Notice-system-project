<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoompostfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roompostfiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roompost_id')->unsigned();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('roompostfiles');
    }
}
