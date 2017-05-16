<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Facades\Datatables;
use App\Models\Survey;
use App\Helper\Common;

class SurveyController extends BaseController
{
    public function index()
    {
        return view('backend.modules.survey.index');
    }

    public function getAjaxList()
    {
        $surveys = Survey::with(['customer' => function($query){
                        $query->select('first_name', 'email');
                    }])->get();

        foreach ($surveys as &$survey) {
            $id = $survey['id'];

            $survey['customer_name'] = $survey->customer ? $survey->customer->first_name : '';
            $survey['customer_email'] = $survey->customer ? $survey->customer->email : '';

            // Checkbox
            $survey['checkbox'] = '<div class="checkbox checkbox-success">
                                        <input id="checkbox' . $id . '" type="checkbox" class="check" value="' . $id . '">
                                        <label for="checkbox' . $id . '"></label>
                                  </div>';
        }
        return Datatables::of($surveys)->make(true);
    }
}
