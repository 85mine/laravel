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
    public function getMenu(){
        return view('modules.project.menu');
    }
}