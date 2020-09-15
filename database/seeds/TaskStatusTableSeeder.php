<?php

use Illuminate\Database\Seeder;

class TaskStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::truncate();
      Role::create(['state'=>'processing']);
      Role::create(['state'=>'followup']);
      Role::create(['state'=>'stuck or pending']);
      Role::create(['state'=>'negotiating']);
      Role::create(['state'=>'done']);
    }
}
