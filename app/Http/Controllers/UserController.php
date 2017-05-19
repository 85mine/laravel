<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use App\Models\Company;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserService;
use App\Validators\UserAddValidator;
use App\Validators\UserValidator;
use App\Validators\Exceptions\ValidatorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class UserController extends BaseController
{
    protected $user;

    protected $userService;

    private $validator;

    private $repository;

    public function __construct(Request $request,
                                UserService $userService,
                                UserRepositoryInterface $repository,
                                UserValidator $validator){
        $this->user = Auth::user();
        $this->userService = $userService;
        $this->validator = $validator;
        $this->repository = $repository;
        parent::__construct($request);
    }

    public function getLogin()
    {
        $messages = $this->messages;
        return view('backend.modules.user.login',compact('messages'));
    }

    public function postLogin()
    {
        try {
            try{
                $this->validator->validate($this->request->all());
            }catch (ValidatorException $e){
                Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
                return redirect(route('user.getLogin'))->withInput();
            }

            if (Auth::attempt(['email' => $this->request->get('email'), 'password' => $this->request->get('password')])) {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.user.login.fails')]);
                return redirect(route('user.getLogin'))->withInput();
            }
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('user.getLogin'))->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect(route('user.getLogin'));
    }

    // After login
    public function getDashboard()
    {
        return view('backend.modules.home.index');
    }

    public function getActiveEmail()
    {
        $activeEmail = $this->userService->activeEmail($this->request->get('token'));
        return view('backend.modules.user.active_email')->with([
            'check' => $activeEmail['status']
        ]);
    }

    public function getConfirmEmail()
    {
        return view('backend.modules.user.confirm_email');
    }

    public function postConfirmEmail()
    {
        $confirmEmail = $this->userService->sendConfirmEmail($this->user);
        $input = $this->request->all();
        $input['check'] = $confirmEmail['status'];
        $input['message'] = $confirmEmail['message'];
        return redirect(route('user.getConfirmEmail'))->withInput($input);
    }

    public function getIndex(){
        $messages = $this->messages;
        return view('backend.modules.user.index',compact('messages'));
    }

    public function getAdd(){
        $messages = $this->messages;

        $companies = Company::pluck('company_name', 'id')->all();

        return view('backend.modules.user.add',compact('messages','companies'));
    }

    public function postAdd(UserAddValidator $validator){

        try{
            $validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('user.get.add'))->withInput();
        }

        $data = $this->request->input();
        $data['status'] = 0;

        $this->repository->create($data);
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.user.add_success')]);
        return redirect(route('user.get.index'));
    }

    public function getEdit($id){

        $user =  $this->repository->find($id);

        if (!$user) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.common.user_not_found')]);
            return redirect(route('user.get.index'));
        }
        $companies = Company::pluck('company_name', 'id')->all();
        $messages = $this->messages;
        return view('backend.modules.user.edit', compact('user','messages','companies'));
    }

    public function postEdit($id,UserAddValidator $validator){

        try{
            $validator->validate($this->request->all());
        }catch (ValidatorException $e){
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, $e->getMessageBag());
            return redirect(route('user.get.edit', $id))->withInput();
        }
        $this->repository->update($id,$this->request->input());
        Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.user.edit_success')]);
        return redirect(route('user.get.index'));
    }

    public function getAjaxData(){
        $data = $this->repository->with(['company' => function ($query) {
            $query->select('id', 'company_name');
        }])->get();
        return Datatables::of($data)->make(true);
    }

    public function postDelete()
    {
        try {
            $id = $this->request->s_ids;
            $ids = explode(",", $id);

            $this->repository->whereIn('id',$ids)->delete();

            Common::setMessage($this->request, MESSAGE_STATUS_SUCCESS, [trans('messages.user.delete_success')]);
            return redirect(route('user.get.index'));
        } catch (\Exception $e) {
            Common::setMessage($this->request, MESSAGE_STATUS_ERROR, [trans('messages.user.delete_fail')]);
            return redirect(route('user.get.index'));
        }

    }
}
