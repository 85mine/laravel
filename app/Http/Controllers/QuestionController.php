<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\QuestionValidator;
use App\Models\Question;
use App\Helper\Common;

class QuestionController extends BaseController
{
    public function index()
    {
        $data = Question::paginate(2);
        return view('backend.modules.question.index', compact('data'));
    }
    public function getAdd(Request $request)
    {
        $question = new Question();
        $route = 'question.postAdd';
        $breadcrumb = trans('labels.label.question.breadcrumb.add');
        $messages = Common::getMessage($request);

        return view('backend.modules.question.form', compact('question', 'route', 'breadcrumb', 'messages'));
    }

    public function postAdd(Request $request){
        try {
            $questionValidator = new QuestionValidator();
            $validator = $this->checkValidator($request->all(), $questionValidator->validateQuestion());
            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('question.add'))->withInput();
            }

            $data = new Question();

            $data->content = $request->content;
            $data->answer = json_encode($request->answer);
            $data->status = $request->status;
            $data->save();

            return redirect()->intended(route('question.index'));

        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('question.add'))->withInput();
        }
    }

}
