<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends BaseController
{
    public function getChosingProject() {
        return view('modules.project.chosing_project');
    }
}
