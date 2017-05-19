<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\EloquentCustomerRepository;
use App\Validators\CustomerValidator;
use App\Validators\Exceptions\ValidatorException;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CustomerController extends BaseController
{

    private $validator;

    private $repository;

    public function __construct(Request $request, CustomerRepositoryInterface $repository, CustomerValidator $validator){
        $this->validator = $validator;
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function getIndex(){
        $messages = $this->messages;
        return view('backend.modules.customer.index',compact('messages'));
    }

    public function getAdd(){
        $messages = $this->messages;
        return view('backend.modules.customer.add',compact('messages'));
    }

    public function postAdd(){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('customer.get.add'))->withInput();
        }
        $this->repository->create($this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.customer.add_success')]);
        return redirect(route('customer.get.index'));
    }

    public function getEdit($id){

        $customer =  $this->repository->find($id);

        if (!$customer) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.user_not_found')]);
            return redirect(route('customer.get.index'));
        }

        $messages = $this->messages;
        return view('backend.modules.customer.edit', compact('customer','messages'));
    }

    public function postEdit($id){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('customer.get.edit', $id))->withInput();
        }

        $this->repository->update($id,$this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.customer.edit_success')]);
        return redirect(route('customer.get.index'));
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

            Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.customer.delete_success')]);
            return redirect(route('customer.get.index'));
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.customer.delete_fail')]);
            return redirect(route('customer.get.index'));
        }

    }
}
