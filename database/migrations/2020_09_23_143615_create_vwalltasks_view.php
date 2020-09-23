<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwalltasksView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW vwalltasks 
            AS
            select `vt`.`id` AS `id`,`vt`.`tid` AS `tid`,`vt`.`created_at` AS `created_at`,`vt`.`joid` AS `joid`,`vt`.`taskname` AS `taskname`,`vt`.`leadtime` AS `leadtime`,`vt`.`amount` AS `amount`,`vt`.`name` AS `name`,`vt`.`tsid` AS `tsid`,`vt`.`state` AS `state`,`jo`.`datedue` AS `datedue`,`jo`.`assignedto` AS `assignedto`,(select  `users`.`name` from  `users` where ( `users`.`id` = `jo`.`assignedto`)) AS `assigned`,`jo`.`cid` AS `cid`,(select  `clients`.`clientname` from  `clients` where ( `clients`.`id` = `jo`.`cid`)) AS `clientname` from ( `vwtasks` `vt` join  `joborders` `jo` on((`vt`.`joid` = `jo`.`id`)))
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwalltasks');
    }
}
