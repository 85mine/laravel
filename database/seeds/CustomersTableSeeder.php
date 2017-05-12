<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach (range(1,2000) as $item){
            foreach(range(1,2000) as $index)
            {
                DB::table('customers')->insert([
                    'first_name' => $faker->name,
                    'last_name' => $faker->name,
                    'phone_number'=> $faker->phoneNumber,
                    'email' => $faker->companyEmail,
                    'created_at' => $faker->dateTime,
                ]);
            }
        }
    }
}
