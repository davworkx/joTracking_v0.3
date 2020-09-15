<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoTransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jo_transfer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('joid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('transferby');
            $table->timestamps();
            $table->foreign('joid')->references('id')->on('joborders');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('transferby')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jo_transfer');
    }
}
