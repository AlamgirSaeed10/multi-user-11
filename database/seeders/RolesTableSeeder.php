<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can define the roles data you want to seed here
        $roles = [
            ['RoleId' => 1, 'RoleName' => 'superadmin', 'created_at' => now(), 'updated_at' => now()],
            ['RoleId' => 2, 'RoleName' => 'manager', 'created_at' => now(), 'updated_at' => now()],
            ['RoleId' => 3, 'RoleName' => 'client', 'created_at' => now(), 'updated_at' => now()],
            ['RoleId' => 4, 'RoleName' => 'employee', 'created_at' => now(), 'updated_at' => now()],

        ];

        $admin = [

            'name' => 'Admin', 'email' => 'admin@gmail.com', 'RoleID' => 1,'email_verified_at' => null, 'password' => Hash::make('12345678'), 'remember_token' => null, 'created_at' => now(),'updated_at' => now()
        ];

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($admin);
    }
}
