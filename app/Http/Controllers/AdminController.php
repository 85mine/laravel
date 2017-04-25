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
}
