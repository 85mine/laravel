<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends BaseController
{
    public function index(Request $request)
    {
        return view('modules.report.index');
    }
}
