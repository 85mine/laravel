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
        DB::table('companies')->insert([
            [
                'company_name' => 'AltPlus VietNam Co., Ltd',
                'company_address' => '31F Keangnam Ha Noi Landmark Tower 72, Lot E6  Pham Hung Street, Me Tri Ward, Nam Tu Liem District, Ha Noi.',
                'company_mobile' => '0438888888',
                'company_email' => 'contact@altplus.com.vn',
                'company_website' => 'https://altplus.com.vn/?lang=en',
                'representative_name' => 'Nguyen Tran Nghia',
                'representative_mobile' => '0912888888',
            ],
            [
                'company_name' => 'AltPlus Inc.',
                'company_address' => 'Shibuyaminami Tokyu blidg.9F 3-12-18 Shibuya Shibuya-ku Tokyo 150-0002 Japan',
                'company_mobile' => '0439999999',
                'company_email' => 'contact@altplus.co.jp',
                'company_website' => 'http://www.altplus.co.jp/',
                'representative_name' => 'Test',
                'representative_mobile' => '0912999999',
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@123'),
                'status' => 1,
                'company_id' => 0
            ],
            [
                'name' => 'Master staff APV',
                'email' => 'master_staff_apv@alt.com',
                'password' => bcrypt('admin@123'),
                'status' => 1,
                'company_id' => 1
            ],
            [
                'name' => 'Master staff APV',
                'email' => 'sub_staff_apv@alt.com',
                'password' => bcrypt('admin@123'),
                'status' => 1,
                'company_id' => 1
            ],
        ]);
    }
}
