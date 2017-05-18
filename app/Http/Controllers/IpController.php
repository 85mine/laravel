<?php

namespace App\Http\Controllers;

use App\Repositories\IpRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\Helper\Common;
use App\Validators\IpValidator;

class IpController extends BaseController
{

    private $validator;

    private $repository;

    public function __construct(Request $request, IpRepository $repository, IpValidator $validator){
        $this->validator = $validator;
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function getIndex(){
        $messages = $this->messages;
        return view('backend.modules.ip.index',compact('messages'));
    }

    public function getAdd(){
        $messages = $this->messages;
        return view('backend.modules.ip.add',compact('messages'));
    }

    public function postAdd(){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('ip.get.add', [$this->request->id]))->withInput();
        }
        $this->repository->create($this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.ip.add_success')]);
        return redirect(route('ip.get.index'));
    }

    public function getEdit($id){

        $ip =  $this->repository->find($id);

        if (!$ip) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.id_not_found')]);
            return redirect(route('ip.get.index'));
        }

        $messages = $this->messages;
        return view('backend.modules.ip.edit', compact('ip','messages'));
    }

    public function postEdit($id){

        try{
            $this->validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('ip.get.edit', $id))->withInput();
        }

        $this->repository->update($id,$this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.ip.edit_success')]);
        return redirect(route('ip.get.index'));
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

            Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.ip.delete_success')]);
            return redirect(route('ip.get.index'));
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.ip.delete_fail')]);
            return redirect(route('ip.get.index'));
        }

    }
}
