<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Helper\Common;

class HomeController extends BaseController
{
    public function dashboard()
    {
        return redirect(route('project.chosingProject'));
        //return view('modules.home.dashboard');
    }
}
