<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clientname');
            $table->string('branch');
            $table->string('busadd');
            $table->string('tin',20);
            $table->string('email', 100);
            $table->string('contactno',30);
            $table->string('cperson',100);
            $table->unsignedBigInteger('parentID');
            $table->unsignedBigInteger('encodedby');
            $table->timestamps();
            $table->foreign('encodedby')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
