<?php

namespace App\Http\Controllers;

use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Auth;
use App\Helper\Common;
use App\Services\UserService;

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
    public function getDashboard()
    {
        return view('backend.modules.home.index');
    }

    public function getActiveEmail()
    {

    }

    public function getConfirmEmail(Request $request)
    {
        $request->input('check', true);
        return view('backend.modules.user.confirm_email');
    }

    public function postConfirmEmail(Request $request)
    {
        $activeEmail = $this->userService->activeEmail($this->user);
        $request->input('check', true);
        $request->input('message', $activeEmail['message']);
        return redirect(route('user.getConfirmEmail'))->withInput($request->all());
    }
}
