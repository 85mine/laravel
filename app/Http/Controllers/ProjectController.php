<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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
        $candidacy_option = config('config.project.candidacy');
        $sales_option = config('config.project.sales_staff');
        return view('modules.project.list')->with([
            'result_option' => $result_option,
            'service_option' => $service_option,
            'candidacy_option' => $candidacy_option,
            'sales_option' => $sales_option
        ]);
    }

    public function edit($id)
    {
        $result_option = config('config.project.result');
        $accepting_base = config('config.project.accepting_base');
        return view('modules.project.edit')->with(['result_option' => $result_option, 'accepting_base' => $accepting_base]);
    }

    public function sendMail(Request $request)
    {
        if ($request->ajax()) {
            $isSent = Mail::send('modules.mail.reminder', ['user' => "admin"], function ($m) {
                $m->from('admin@pittokuru.com', 'Admin');

                $m->to("linh.nv@altplus.com.vn", "Nguyen Van Linh")->subject('Your Subject!');
            });
            if ($isSent) {
                return response()->json([
                    'response' => 'Mail has been sent successfully!'
                ]);
            }
            return response()->json([
                'response' => 'Mail has been sent failure!'
            ]);
        }
    }

}
