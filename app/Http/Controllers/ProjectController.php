<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends BaseController
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

    //Create Base Action
    public function createBase()
    {
        return view('modules.admin.create_base');
    }

    //Delete Project Action
    public function deleteProject()
    {
        return view('modules.admin.home');
    }

    //Menu project
    public function getMenu()
    {
        return view('modules.project.menu');
    }

    public function getChosingProject()
    {
        return view('modules.project.chosing_project');
    }
}
