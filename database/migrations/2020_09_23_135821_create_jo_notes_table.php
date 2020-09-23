<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jo_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('joid');
            $table->unsignedBigInteger('userid');
            $table->text('note');
            $table->datetime('datecreated');

            $table->foreign('joid')->references('id')->on('joborders');
            $table->foreign('userid')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jo_notes');
    }
}
