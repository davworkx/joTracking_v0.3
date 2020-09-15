<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clientID');
            $table->date('applicableDate');
            $table->bigInteger('formID');
            $table->string('locationReference');
            $table->string('filetype', 100);
            $table->bigInteger('uploadedBy');
            $table->tinyInteger('isDeleted');
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
        Schema::dropIfExists('client_files');
    }
}
