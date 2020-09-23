<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwjosdetailsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW vwjosdetails 
        AS
        select 
            `jo`.`id` AS `id`,`jo`.`cid` AS `cid`,(select  `clients`.`clientname` from  `clients` where  `clients`.`id` = `jo`.`cid`) AS `clientname`,`jo`.`datedue` AS `datedue`,`jo`.`assignedto` AS `assignedto`,(select  `users`.`name` from  `users` where  `users`.`id` = `jo`.`assignedto`) AS `username`,(select  `users`.`name` from  `users` where  `users`.`id` = `jo`.`encodedby`) AS `encodedby`,`jo`.`created_at` AS `created_at`,(select sum(`vwtasks`.`tsid`) from  `vwtasks` where `vwtasks`.`joid` = `jo`.`id`) AS `sumofstatus`,(select count(`vwtasks`.`joid`) from  `vwtasks` where `vwtasks`.`joid` = `jo`.`id`) AS `jcount`,(select max( `taskstatus`.`id`) from  `taskstatus`) AS `maxstate`,(select count(`vwtasks`.`joid`) from  `vwtasks` where `vwtasks`.`joid` = `jo`.`id`) * (select max( `taskstatus`.`id`) from  `taskstatus`) AS `total`,if((select sum(`vwtasks`.`tsid`) from  `vwtasks` where `vwtasks`.`joid` = `jo`.`id`) = (select count(`vwtasks`.`joid`) from  `vwtasks` where `vwtasks`.`joid` = `jo`.`id`) * (select max( `taskstatus`.`id`) from  `taskstatus`),'done','NO') AS `s`,to_days(curdate()) - to_days(`jo`.`created_at`) AS `days`,(select group_concat( `jo_notes`.`datecreated`,' [',(select  `users`.`name` from  `users` where  `users`.`id` =  `jo_notes`.`userid`),']<br>', `jo_notes`.`note` separator ' <br> ') from  `jo_notes` where  `jo_notes`.`joid` = `jo`.`id`) AS `jonotes` from  `joborders` `jo` order by to_days(curdate()) - to_days(`jo`.`created_at`) desc
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwjosdetails');
    }
}
