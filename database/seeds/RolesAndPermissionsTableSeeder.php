<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Administrator', 'description' => ''],
            ['name' => 'hr', 'display_name' => 'HR', 'description' => ''],
            ['name' => 'sales', 'display_name' => 'Sales', 'description' => '']
        ]);

        DB::table('permissions')->insert([
            ['name' => 'user-view', 'display_name' => 'View info users', 'description' => ''],
            ['name' => 'user-modify', 'display_name' => 'Modify info users', 'description' => '']
        ]);

        DB::table('permission_role')->insert([
            ['permission_id' => '1', 'role_id' => '1'],
            ['permission_id' => '1', 'role_id' => '2'],
            ['permission_id' => '1', 'role_id' => '3'],
            ['permission_id' => '2', 'role_id' => '1']
        ]);

        DB::table('role_user')->insert([
            ['user_id' => '1', 'role_id' => '1'],
            ['user_id' => '2', 'role_id' => '2'],
            ['user_id' => '3', 'role_id' => '3']
        ]);

    }
}
