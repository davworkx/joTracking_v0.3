<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwjoupdatesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW vwjoupdates 
            AS
            select 
                `jon`.`id` AS `id`,(select `vwjosdetails`.`assignedto` from  `vwjosdetails` where `vwjosdetails`.`id` = `jon`.`id`) AS `assigned`,`jon`.`joid` AS `joid`,(select (select  `clients`.`clientname` from  `clients` where  `clients`.`id` =  `joborders`.`cid`) from  `joborders` where  `joborders`.`id` = `jon`.`joid`) AS `joclient`,`jon`.`userid` AS `userid`,(select  `users`.`name` from  `users` where  `users`.`id` = `jon`.`userid`) AS `name`,`jon`.`note` AS `note`,`jon`.`datecreated` AS `datecreated` from `jo_notes` `jon`

        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwjoupdates');
    }
}
