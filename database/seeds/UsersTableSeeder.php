<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 'name' => 'Admin', 'email' => 'admin@pittokuru.com', 'password' => bcrypt('admin@123') ],
            [ 'name' => 'HR', 'email' => 'hr@pittokuru.com', 'password' => bcrypt('admin@123') ],
            [ 'name' => 'Sales', 'email' => 'sales@pittokuru.com', 'password' => bcrypt('admin@123') ]
        ]);
    }
}
