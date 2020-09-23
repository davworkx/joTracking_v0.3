<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwbillingsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW vwbillings
            AS
            select `jo`.`id` AS `id`,`jo`.`cid` AS `cid`,`jo`.`assignedto` AS `assignedto`,(select  `clients`.`clientname` from  `clients` where  `clients`.`id` = `jo`.`cid`) AS `clientname`,(select sum( `tasks`.`amount`) from  `tasks` where  `tasks`.`joid` = `jo`.`id`) AS `amount`,(select ifnull(sum( `billings`.`amount`),0.00) from  `billings` where  `billings`.`joid` = `jo`.`id`) AS `paidamount`,(select max( `billings`.`ornumber`) from  `billings` where  `billings`.`joid` = `jo`.`id`) AS `ornumber`,`jo`.`created_at` AS `created_at` from  `joborders` `jo`
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwbillings');
    }
}
