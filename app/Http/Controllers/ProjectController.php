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
}
