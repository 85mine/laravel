<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectController extends BaseController
{
    //Menu project
    public function getMenu(){
        return view('modules.project.menu');
    }
}
