<?php

namespace App\Http\Controllers;

use App\Models\ConfirmEmail;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Auth;
use App\Helper\Common;
use App\Services\UserService;

class QrController extends BaseController
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

    public function getList()
    {

    }

    public function getCreate()
    {
        return view('backend.modules.qr.create');
    }
}
