<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignmentanswers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assignment_id')->unsigned();
            $table->string('user_id');
            $table->string('assignment_file');
            $table->string('assignment_submit_date');
            $table->string('assignment_submit_time');
            $table->foreign('assignment_id')->references('id')->on('assignments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignmentanswers');
    }
}
