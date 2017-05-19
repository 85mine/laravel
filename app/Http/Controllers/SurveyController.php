<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Survey;
use App\Helper\Common;

use App\Http\Requests;
use App\Models\Question;

class SurveyController extends BaseController
{
    public function getIndex()
    {
        return view('frontend.layout.index');
    }

    public function getSurvey()
    {
        $questions = Question::where('status', 1)->get();
        return view('frontend.layout.survey', compact('questions'));
    }

    public function postSurvey(Request $request)
    {
        $questions = $request->questions;
        $question_type = $request->question_type;
        $mark = config('config.question.mark');
        $list_type = config('config.question.type');

        $marks = [];
        foreach ($list_type as $key => $type) {
            $marks[$key] = 0;
        }

        foreach ($questions as $key => $answer) {
            $total = 0;
            foreach ($answer as $item_answer) {
                $total += $mark[$item_answer];
            }

            $type = $question_type[$key][0];
            $marks[$type] += $total;

        }

        dd($marks);

        return redirect()->route('survey.result')->with(compact('marks'));
    }

    public function getResult()
    {
        return view('frontend.layout.result');
    }

    public function index()
    {
        return view('backend.modules.survey.index');
    }

    public function getAjaxList()
    {
        $surveys = Survey::with(['customer' => function ($query) {
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
