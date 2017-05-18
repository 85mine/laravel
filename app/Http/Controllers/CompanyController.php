<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use App\Repositories\CompanyRepository;
use App\Validators\CompanyValidator;
use App\Validators\Exceptions\ValidatorException;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CompanyController extends BaseController
{

    private $validator;

    private $repository;

    public function __construct(Request $request, CompanyRepository $repository, CompanyValidator $validator){
        $this->validator = $validator;
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function getIndex(){
        $messages = $this->messages;
        return view('backend.modules.company.index',compact('messages'));
    }

    public function getAdd(){
        $messages = $this->messages;
        return view('backend.modules.company.add',compact('messages'));
    }

    public function postAdd(){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('company.get.add'))->withInput();
        }
        $this->repository->create($this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.add_success')]);
        return redirect(route('company.get.index'));
    }

    public function getEdit($id){

        $company =  $this->repository->find($id);

        if (!$company) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.user_not_found')]);
            return redirect(route('company.get.index'));
        }

        $messages = $this->messages;
        return view('backend.modules.company.edit', compact('company','messages'));
    }

    public function postEdit($id){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('company.get.edit', $id))->withInput();
        }

        $this->repository->update($id,$this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.edit_success')]);
        return redirect(route('company.get.index'));
    }

    public function getAjaxData(){
        $data = $this->repository->all();
        return Datatables::of($data)->make(true);
    }

    public function postDelete()
    {
        try {
            $id = $this->request->s_ids;
            $ids = explode(",", $id);

            $this->repository->whereIn('id',$ids)->delete();

            Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.company.delete_success')]);
            return redirect(route('company.get.index'));
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.company.delete_fail')]);
            return redirect(route('company.get.index'));
        }

    }
}
