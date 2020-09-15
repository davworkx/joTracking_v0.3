<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $superAdminRole = Role::where('name','superadmin')->first();
        $adminRole = Role::where('name','admin')->first();
        $userRole = Role::where('name','user')->first();

        $superadmin = User::create([
          'name' => 'Super Admin',
          'email' => 'superadmin@test.com',
          'password'=> bcrypt('superadmin')
        ]);
        $admin = User::create([
          'name' => 'AAA Admin',
          'email' => 'admin@test.com',
          'password'=> bcrypt('admin')
        ]);
        $user = User::create([
          'name' => 'UUU User',
          'email' => 'user@test.com',
          'password'=> bcrypt('user')
        ]);

        $superadmin->roles()->attach($superAdminRole);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);

    }
}
