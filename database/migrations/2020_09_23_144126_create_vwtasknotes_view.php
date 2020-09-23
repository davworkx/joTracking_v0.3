<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVwtasknotesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW vwtasknotes 
            AS

            select  `tasktrackings`.`id` AS `id`, `tasktrackings`.`tid` AS `tid`, `tasktrackings`.`tsid` AS `tsid`,(select  `taskstatus`.`state` from  `taskstatus` where ( `taskstatus`.`id` =  `tasktrackings`.`tsid`)) AS `status`, `tasktrackings`.`uid` AS `uid`,(select  `users`.`name` from  `users` where ( `users`.`id` =  `tasktrackings`.`uid`)) AS `name`, `tasktrackings`.`remarks` AS `remarks`, `tasktrackings`.`created_at` AS `created_at` from  `tasktrackings`
    
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vwtasknotes');
    }
}
