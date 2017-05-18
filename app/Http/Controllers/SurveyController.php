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

        $mark_design = 0;
        $mark_space = 0;
        $mark_request = 0;
        $mark_function = 0;
        $mark_purpose = 0;
        //dd($question_type,$questions);

        foreach ($questions as $key => $answer) {
            $total = 0;
            foreach ($answer as $item_answer) {
                $total += $mark[$item_answer];
            }

            $type = $question_type[$key][0];
            switch ($type) {
                case 'design':
                    $mark_design += $total;
                    break;
                case 'space':
                    $mark_space += $total;
                    break;
                case 'request':
                    $mark_request += $total;
                    break;
                case 'function':
                    $mark_function += $total;
                    break;
                case 'purpose':
                    $mark_purpose += $total;
                    break;
                default:
                    break;
            }
        }

//        dd([$mark_design,$mark_space,$mark_request,$mark_function,$mark_purpose]);

        $result = 10000;
        return redirect()->route('survey.result')->with(compact('result', 'mark_design', 'mark_space', 'mark_request', 'mark_function', 'mark_purpose'));
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
