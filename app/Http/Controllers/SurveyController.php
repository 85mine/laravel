<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Question;

class SurveyController extends BaseController
{
    public function index() {
        return view('frontend.layout.index');
    }

    public function getSurvey() {
        $questions = Question::where('status', 1)->paginate(1);
        return view('frontend.layout.survey', compact('questions'));
    }

    public function postSurvey(Request $request) {

    }
}
