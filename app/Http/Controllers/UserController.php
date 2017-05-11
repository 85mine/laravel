<?php

namespace App\Http\Controllers;

use App\Models\ConfirmEmail;
use App\Validators\UserValidator;
use App\Validators\AddUserValidator;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use Auth;
use App\Helper\Common;
use App\Services\UserService;
use App\Models\User;
use App\Models\Company;
use DB;

class UserController extends BaseController
{
    protected $user;
    protected $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->user = Auth::user();
        $this->userService = $userService;
    }

    // before login
    public function getIndex(Request $request) {
        return redirect(route('user.getLogin'));
    }

    public function getLogin(Request $request)
    {
        $messages = Common::getMessage($request);
        return view('backend.modules.user.login')->with([
            'messages' => $messages
        ]);
    }

    public function postLogin(Request $request)
    {
        try {
            $userValidator = new UserValidator();
            $validator = $this->checkValidator($request->all(), $userValidator->validateLogin());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('user.getLogin'))->withInput();
            }

            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.user.login.fails')]);
                return redirect(route('user.getLogin'))->withInput();
            }
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            return redirect(route('user.getLogin'))->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect(route('user.getLogin'));
    }

    // after login
    public function getDashboard(Request $request)
    {
        return view('backend.modules.home.index');
    }

    public function getActiveEmail(Request $request)
    {
        $activeEmail = $this->userService->activeEmail($request->get('token'));
        return view('backend.modules.user.active_email')->with([
            'check' => $activeEmail['status']
        ]);
    }

    public function getConfirmEmail(Request $request)
    {
        return view('backend.modules.user.confirm_email');
    }

    public function postConfirmEmail(Request $request)
    {
        $confirmEmail = $this->userService->sendConfirmEmail($this->user);
        $input = $request->all();
        $input['check'] = $confirmEmail['status'];
        $input['message'] = $confirmEmail['message'];
        return redirect(route('user.getConfirmEmail'))->withInput($input);
    }

    // Get list user
    public function listUser()
    {
        return view('backend/modules/user/list');
    }

    public function getAjaxList()
    {
        $userList = User::with('company')->get();

        foreach ($userList as &$user) {
            $id = $user['id'];
            $edit_url = route('user.getEdit', [$id]);

            $user['company_name'] = $user->company ? $user->company->company_name : '';
            $user['status'] = $user->status == 1 ? trans('labels.label.user.create.active') : trans('labels.label.user.create.disable');

            // Checkbox
            $user['checkbox'] = '<div class="checkbox checkbox-success">
                                        <input id="checkbox' . $id . '" type="checkbox" class="check" value="' . $id . '">
                                        <label for="checkbox' . $id . '"></label>
                                  </div>';
            $user['buttons'] = '<div class="btn-group">';
            $user['buttons'] .= '<a href="' . $edit_url . '" class="btn btn-warning edit" title="' . trans('labels.label.common.btnEdit') . '"><i class="fa fa-edit"></i></a>';
            $user['buttons'] .= '<a href="javascript:;" class="btn btn-danger delete" title="' . trans('labels.label.common.btnDelete') . '" data-delete="' . $id . '"><i class="fa fa-remove"></i></a>';
            $user['buttons'] .= '</div>';
        }
        return Datatables::of($userList)->make(true);
    }

    // Create user
    public function createUser(Request $request)
    {
        $user = new User();
        $companies = Company::pluck('company_name', 'id')->all();

        $route = 'user.add';
        $title = trans('labels.label.user.add');
        $messages = Common::getMessage($request);

        return view('backend/modules/user/create', compact('user', 'route', 'title', 'messages', 'companies'));
    }

    // Save user from add form
    public function addUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $userValidator = new AddUserValidator();
            $validator = $this->checkValidator($request->all(), $userValidator->validateAddUser());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('user.create'))->withInput();
            }

            $user = new User();
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->status = 0;
            $user->company_id = $request->company_id;
            $user->save();
            DB::commit();

            return redirect()->intended(route('user.list'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            DB::rollback();
            return redirect(route('user.create'))->withInput();
        }
    }

    // Save user from edit form
    public function postEditUser(Request $request)
    {
        DB::beginTransaction();
        try {
            $userValidator = new AddUserValidator();
            $validator = $this->checkValidator($request->all(), $userValidator->validateAddUser());

            if ($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('user.getEdit', ['id' => 4]))->withInput();
            }

            $user = User::find($request->id);
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->status = $request->status;
            $user->company_id = $request->company_id;
            $user->save();
            DB::commit();

            return redirect()->intended(route('user.list'));
        } catch (\Exception $e) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, $e->getMessage());
            DB::rollback();
            return redirect(route('user.getEdit', ['id' => 4]))->withInput();
        }
    }

    // Edit user
    public function getEdit(Request $request, $id)
    {
        $user = User::find($id);
        $companies = Company::pluck('company_name', 'id')->all();

        if (!$user) {
            Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.common.user_not_found')]);
            return redirect(route('user.list'));
        }
        $route = 'user.postEdit';
        $title = trans('labels.title.user.edit');
        $messages = Common::getMessage($request);

        return view('backend/modules/user/create', compact('user', 'route', 'title', 'messages', 'companies'));
    }
}
