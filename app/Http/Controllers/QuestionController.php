<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\CompanyValidator;
use App\Models\Question;
use App\Helper\Common;

class QuestionController extends BaseController
{
    public function index()
    {
        $data = Question::paginate(2);
        return view('backend.modules.question.index', compact('data'));
    }
    public function add(Request $request)
    {
        if(!empty($request)){
            $messages = Common::getMessage($request);
        }

        return view('backend.modules.question.add',compact('messages'));
    }

}
