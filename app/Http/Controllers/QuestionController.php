<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\Validators\Exceptions\ValidatorException;
use App\Validators\QuestionValidator;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Helper\Common;

class QuestionController extends BaseController
{

    private $validator;

    private $repository;

    public function __construct(Request $request, QuestionRepository $repository, QuestionValidator $validator){
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
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('question.get.add'))->withInput();
        }
        $this->repository->create($this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.question.add_success')]);
        return redirect(route('question.get.index'));
    }

    public function getEdit($id){

        $ip =  $this->repository->find($id);

        if (!$ip) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('question.get.index'));
        }

        $messages = $this->messages;
        return view('backend.modules.question.edit', compact('ip','messages'));
    }

    public function postEdit($id){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('question.get.edit', $id))->withInput();
        }

        $this->repository->update($id,$this->request->input());
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
