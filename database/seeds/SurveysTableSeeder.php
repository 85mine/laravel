<?php

use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log_survey')->insert([
            [
                'customer_id' => 106,
                'survey_content' => 'dummy content survey 111'
            ],
            [
                'customer_id' => 105,
                'survey_content' => 'dummy content  222'
            ],
            [
                'customer_id' => 108,
                'survey_content' => 'dummy content  333',
            ],
        ]);
    }
}
