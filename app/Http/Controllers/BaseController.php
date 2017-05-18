<?php

namespace App\Http\Controllers;

use App\Helper\Common;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

abstract class BaseController extends Controller
{

    protected $request;

    protected $messages;

    /**
     * BaseController constructor.
     * @param Request $request
     */
    public function __construct(Request $request){
        $this->request = $request;
        $this->messages = Common::getMessage($request);
    }

    /**
     * @param $type
     * @param MessageBag $messages
     * @internal param Request $request
     */
    public function setMessages($type, MessageBag $messages){
        Common::setMessage($this->request, $type, $messages);
    }

}
