<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clientid');
            $table->string('businessID', 30)->nullable();
            $table->unsignedBigInteger('RDO')->nullable();
            $table->string('tax_class', 100)->nullable();
            $table->string('tax_type', 100)->nullable();
            $table->date('date_registered')->nullable();
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
        Schema::dropIfExists('clients_data');
    }
}
