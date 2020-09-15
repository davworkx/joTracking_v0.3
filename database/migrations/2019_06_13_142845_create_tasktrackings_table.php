<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasktrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasktrackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tid');
            $table->unsignedBigInteger('tsid');
            $table->unsignedBigInteger('uid');
            $table->string('remarks');
            $table->timestamps();
            $table->foreign('tid')->references('id')->on('tasks');
            $table->foreign('tsid')->references('id')->on('taskstatus');
            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasktracking');
    }
}
