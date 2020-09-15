<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joborders', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('cid');
          $table->date('datedue');
          $table->unsignedBigInteger('assignedto');
          $table->unsignedBigInteger('encodedby');
          $table->timestamps();
          $table->foreign('encodedby')->references('id')->on('users');
          $table->foreign('assignedto')->references('id')->on('users');
          $table->foreign('cid')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joborders');
    }
}
