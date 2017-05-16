<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\QuestionValidator;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Question;
use App\Helper\Common;

class QuestionController extends BaseController {
    public function index(Request $request) {
        $messages = Common::getMessage($request);
        return view('backend.modules.question.index', compact('messages'));
    }

    public function getAdd(Request $request) {
        $question = new Question();
        $route = 'question.postAdd';
        $breadcrumb = trans('labels.label.question.breadcrumb.add');
        $messages = Common::getMessage($request);
        if(!empty($messages)){
            $question->content = $request->old('question_content');
            $question->answer = json_encode($request->old('answer'));
            $question->status = json_encode($request->old('answer'));
        }

        return view('backend.modules.question.form', compact('question', 'route', 'breadcrumb', 'messages'));
    }

    public function postAdd(Request $request) {
        try {
            $questionValidator = new QuestionValidator();
            $res = $questionValidator->validateQuestion();
            foreach ($request->answer as $key => $answer_item){
                $res['attributes']['answer.'.$key] = trans('labels.label.question.column.answer').' ('.($key+1).') ';
            }
            $validator = $this->checkValidator($request->all(), $res);
            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('question.add'))->withInput();
            }
            $question = new Question();
            $question->content = trim($request->question_content);
            $question->answer = preg_replace('/\s{2,}/', ' ', json_encode($request->answer));
            $question->status = $request->status;
            $question->save();
            return redirect()->intended(route('question.index'));

        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('question.add'))->withInput();
        }
    }

    public function getEdit(Request $request, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('question.index'));
        }
        $route = 'question.postEdit';
        $breadcrumb = trans('labels.label.question.breadcrumb.edit');
        $messages = Common::getMessage($request);
        if(!empty($messages)){
            $question->content = $request->old('question_content');
            $question->answer = json_encode($request->old('answer'));
            $question->status = json_encode($request->old('answer'));
        }
        return view('backend.modules.question.form', compact('question', 'route', 'breadcrumb', 'messages'));
    }

    public function postEdit(Request $request)
    {
        try {
            $questionValidator = new QuestionValidator();
            $res = $questionValidator->validateQuestion();
            foreach ($request->answer as $key => $answer_item){
                $res['attributes']['answer.'.$key] = trans('labels.label.question.column.answer').' ('.($key+1).') ';
            }
            $validator = $this->checkValidator($request->all(), $res);

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('question.getEdit',[$request->id]))->withInput();
            }

            $question = Question::find($request->id);


            $question->content = trim($request->question_content);
            $question->answer = preg_replace('/\s{2,}/', ' ', json_encode($request->answer));
            $question->status = $request->status;
            $question->save();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.edit_success')]);
            return redirect(route('question.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('question.getEdit'))->withInput();
        }
    }

    public function postDelete(Request $request)
    {
        try {
            $id = $request->s_ids;
            $ids = explode(",", $id);
            Question::whereIn('id', $ids)->delete();
            Common::setMessage($request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.delete_success')]);
            return redirect()->intended(route('question.index'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('question.index'));
        }

    }

    public function ajaxData() {
        $data = Question::all();
        return Datatables::of($data)->make(true);
    }
}
