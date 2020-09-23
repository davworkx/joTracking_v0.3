<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('taskstatus')->insert([
        ['state'=>'processing'],
        ['state'=>'followup'],
        ['state'=>'stuck or pending'],
        ['state'=>'negotiating'],
        ['state'=>'done']
    ]);

    }
}
