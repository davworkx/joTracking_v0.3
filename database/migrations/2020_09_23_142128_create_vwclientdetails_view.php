<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwclientdetailsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW vwclientdetails
            AS 
            select `c`.`id` AS `id`,`c`.`clientname` AS `clientname`,`c`.`branch` AS `branch`,`c`.`busadd` AS `busadd`,`c`.`tin` AS `tin`,`c`.`email` AS `email`,`c`.`contactno` AS `contactno`,`c`.`cperson` AS `cperson`,`c`.`parentID` AS `parentID`,`c`.`encodedby` AS `encodedby`,`c`.`created_at` AS `created_at`,`c`.`updated_at` AS `updated_at`,`cd`.`businessID` AS `businessID`,`cd`.`RDO` AS `RDO`,`cd`.`tax_class` AS `tax_class`,`cd`.`tax_type` AS `tax_type`,`cd`.`date_registered` AS `date_registered` from ( `clients` `c` left join  `clients_data` `cd` on((`c`.`id` = `cd`.`clientid`)))
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwclientdetails');
    }
}
