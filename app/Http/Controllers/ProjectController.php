<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends BaseController
{
    //Create Base Action
    public function createBase()
    {
        return view('modules.admin.create_base');
    }

    //Delete Project Action
    public function deleteProject()
    {
        return view('modules.project.delete');
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

    public function projectList()
    {
        $result_option = config('config.project.result');
        $service_option = config('config.project.service');
        return view('modules.project.list')->with(['result_option' => $result_option, 'service_option' => $service_option]);
    }
}
