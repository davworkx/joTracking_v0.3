<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwtasksView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW vwtasks 
        AS
        select 
            `tt`.`id` AS `id`,`tt`.`tid` AS `tid`,`tt`.`created_at` AS `created_at`,(select  `tasks`.`joid` from  `tasks` where ( `tasks`.`id` = `tt`.`tid`)) AS `joid`,(select  `tasks`.`taskname` from  `tasks` where ( `tasks`.`id` = `tt`.`tid`)) AS `taskname`,(select  `tasks`.`leadtime` from  `tasks` where ( `tasks`.`id` = `tt`.`tid`)) AS `leadtime`,(select  `tasks`.`amount` from  `tasks` where ( `tasks`.`id` = `tt`.`tid`)) AS `amount`,(select  `users`.`name` from  `users` where ( `users`.`id` = `tt`.`uid`)) AS `name`,max(`tt`.`tsid`) AS `tsid`,(select  `taskstatus`.`state` from  `taskstatus` where ( `taskstatus`.`id` = max(`tt`.`tsid`))) AS `state`,group_concat(`tt`.`created_at`,' [',(select  `users`.`name` from  `users` where ( `users`.`id` = `tt`.`uid`)),'] ',`tt`.`remarks` separator '<br>') AS `st` from  `tasktrackings` `tt` group by `tt`.`tid`
    
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwtasks');
    }
}
