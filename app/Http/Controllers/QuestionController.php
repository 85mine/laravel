<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Validators\QuestionValidator;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Question;
use App\Helper\Common;

class QuestionController extends BaseController {
    public function index() {
        return view('backend.modules.question.index');
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
            $validator = $this->checkValidator($request->all(), $questionValidator->validateQuestion());
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
            $validator = $this->checkValidator($request->all(), $questionValidator->validateQuestion());

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
            $id = $request->id;
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
        $list_status = config('config.status_question');
        $range_AZ = range('A','Z');
        foreach ($data as &$_data) {
            $id = $_data['id'];
            $edit_url = route('question.getEdit', [$id]);
            // Checkbox
            $_data['checkbox'] = '<div class="checkbox checkbox-success">
                <input id="checkbox' . $id . '" type="checkbox" class="check" value="' . $id . '">
                <label for="checkbox' . $id . '"></label>
            </div>';

            $list_answer = json_decode($_data['answer']);
            $_data['answer'] = '';
            foreach ($list_answer as $key => $answer){
                $_data['answer'] .= '<p>'.$range_AZ[$key] .' : '.$answer.'</p>';
            }

            $_data['status'] = $list_status[$_data['status']];
            $_data['buttons'] = '<div class="btn-group">';
            $_data['buttons'] .= '<a href="' . $edit_url . '" class="btn btn-warning edit" title="' . trans('labels.label.common.btnEdit') . '"><i class="fa fa-edit"></i></a>';
            $_data['buttons'] .= '<a href="javascript:;" class="btn btn-danger delete" title="' . trans('labels.label.common.btnDelete') . '" data-delete="' . $id . '"><i class="fa fa-remove"></i></a>';
            $_data['buttons'] .= '</div>';
        }
        return Datatables::of($data)->make(true);
    }
}
