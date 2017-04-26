<?php

namespace App\Http\Controllers;

use App\Validators\UserValidator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Helper\Common;

class UserController extends BaseController
{
    public function getLogin(Request $request)
    {
        $messages = Common::getMessage($request);
        return view('modules.user.login')->with([
            'messages' => $messages
        ]);
    }

    public function postLogin(Request $request)
    {
        try {
            $userValidator = new UserValidator();
            $validator = $this->checkValidator($request->all(), $userValidator->validateLogin());

            if($validator->fails()) {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, $validator->getMessageBag());
                return redirect(route('user.getLogin'))->withInput();
            }

            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                return redirect()->intended(route('project.chosingProject'));
            } else {
                Common::setMessage($request, MESSAGE_STATUS_ERROR, [trans('messages.message.user.login.fails')]);
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


}
