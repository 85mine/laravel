<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Helper\Common;

class ProjectController extends BaseController
{
    public function projectList()
    {
        $result_option = config('config.project.result');
        $service_option = config('config.project.service');
        return view('modules.project.list')->with([
            'result_option' => $result_option,
            'service_option'=>$service_option
        ]);
    }
}
