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

    public function getCreateProject(){
        $person_care = config('config.project.person_care');
        $eg_option = config('config.project.eg');
        $attractive_option = config('config.project.attractive');
        $service_option = config('config.project.service');
        $sales_option = config('config.project.sales_staff');
        return view('modules.project.create')->with([
            'person_care' => $person_care,
            'eg_option' => $eg_option,
            'attractive_option' => $attractive_option,
            'service_option' => $service_option,
            'sales_option' => $sales_option
        ]);
    }

    public function getChosingProject()
    {
        return view('modules.project.chosing_project');
    }

    public function projectList()
    {
        $result_option = config('config.project.result');
        $service_option = config('config.project.service');
        $candidacy_option = config('config.project.candidacy');
        $sales_option = config('config.project.sales_staff');
        return view('modules.project.list')->with([
            'result_option' => $result_option,
            'service_option' => $service_option,
            'candidacy_option'=> $candidacy_option,
            'sales_option' => $sales_option
            ]);
    }

    public function edit($id){
        $result_option = config('config.project.result');
        $accepting_base = config('config.project.accepting_base');
        $eg_option = config('config.project.eg');
        $attractive_option = config('config.project.attractive');
        $service_option = config('config.project.service');
        return view('modules.project.edit')->with([
            'result_option' => $result_option,
            'accepting_base' => $accepting_base,
            'eg_option' => $eg_option,
            'attractive_option' => $attractive_option,
            'service_option'=> $service_option,
            ]);
    }
}
