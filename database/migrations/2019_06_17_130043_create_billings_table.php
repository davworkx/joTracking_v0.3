<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ornumber')->unique();
            $table->unsignedBigInteger('joid');
            $table->decimal('amount', 8 ,2);
            $table->string('remarks', 200);
            $table->unsignedBigInteger('encodedby');
            $table->date('paymentdate');
            $table->timestamps();
            $table->foreign('joid')->references('id')->on('joborders');
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
        Schema::dropIfExists('billings');
    }
}
