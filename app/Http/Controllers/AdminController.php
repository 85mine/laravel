<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends BaseController
{
    //Admin action
    public function admin()
    {
        return view('modules.admin.home');
    }

    //Create New Account Action
    public function createAccount()
    {
        return view('modules.admin.create_account');
    }

    //Edit Account Action
    public function editAccount()
    {
        return view('modules.admin.edit_account');
    }

    //Create New Base Action
    public function createBase()
    {
        $dummy_data = [
            [
                'company' => 'PCO',
                'department' => '業務部',
                'base' => '沖縄',
                'short_name' => 'C沖縄'
            ],
            [
                'company' => 'PIT',
                'department' => '業務部',
                'base' => '岐阜',
                'short_name' => 'P岐阜'
            ]
        ];
        return view('modules.admin.create_base', [
            'data' => $dummy_data,
            'count_data' => count($dummy_data)
        ]);
    }
}
