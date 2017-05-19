<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentQuestionRepository;
use App\Repositories\QuestionRepositoryInterface;
use App\Validators\Exceptions\ValidatorException;
use App\Validators\QuestionValidator;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Yajra\Datatables\Facades\Datatables;
use App\Helper\Common;

class QuestionController extends BaseController
{

    private $validator;

    private $repository;

    public function __construct(Request $request, QuestionRepositoryInterface $repository, QuestionValidator $validator){
        $this->validator = $validator;
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function getIndex(){
        $messages = $this->messages;
        return view('backend.modules.question.index',compact('messages'));
    }

    public function getAdd(){
        $messages = $this->messages;
        $list_type = config('config.question.type');
        return view('backend.modules.question.add',compact('messages','list_type'));
    }

    public function postAdd(){
        try{
            $attributes = array();
            foreach ($this->request->answer as $key => $item) {
                $attributes['answer.'.$key] = trans('labels.label.question.column.answer').' ('.($key+1).') ';
            }
            $this->validator->extend_attributes = $attributes ;
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('question.get.add'))->withInput();
        }
        $data = $this->request->input();
        $data['answer'] = preg_replace('/\s{2,}/', ' ', json_encode($this->request->answer));
        $this->repository->create($data);
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.add_success')]);
        return redirect(route('question.get.index'));
    }

    public function getEdit($id){

        $question =  $this->repository->find($id);
        $list_type = config('config.question.type');

        if (!$question) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('question.get.index'));
        }

        $messages = $this->messages;
        return view('backend.modules.question.edit', compact('question','messages','list_type'));
    }

    public function postEdit($id){

        try{
            $attributes = array();
            foreach ($this->request->answer as $key => $item) {
                $attributes['answer.'.$key] = trans('labels.label.question.column.answer').' ('.($key+1).') ';
            }
            $this->validator->extend_attributes = $attributes ;
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('question.get.edit', $id))->withInput();
        }
        $data = $this->request->input();
        $data['answer'] = preg_replace('/\s{2,}/', ' ', json_encode($this->request->answer));
        $this->repository->update($id,$data);
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.edit_success')]);
        return redirect(route('question.get.index'));
    }

    public function getAjaxData(){
        $data = $this->repository->all();
        foreach ($data as $item) {
            if(isset(config('config.question.type')[$item['type']])){
                $item['type'] = config('config.question.type')[$item['type']];
            }
        }
        return Datatables::of($data)->make(true);
    }

    public function postDelete()
    {
        try {
            $id = $this->request->s_ids;
            $ids = explode(",", $id);

            $this->repository->whereIn('id',$ids)->delete();

            Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.delete_success')]);
            return redirect(route('question.get.index'));
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.question.delete_fail')]);
            return redirect(route('question.get.index'));
        }

    }
}
