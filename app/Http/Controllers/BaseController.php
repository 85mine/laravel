<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->user = Auth::user();
        $request->session()->put('segments', $request->segments());
    }

    public function checkValidator($data, $validators) {
        $rules = isset($validators['rules']) ? $validators['rules'] : [];
        $messages = isset($validators['messages']) ? $validators['messages'] : [];
        $attributes = isset($validators['attributes']) ? $validators['attributes'] : [];

        $validator = validator($data, $rules, $messages, $attributes);
        return $validator;
    }

}
