<?php namespace App\Services;

class Service {

    protected $res;

    public function __construct() {
        $this->res['status'] = trans('messages.common.error_when_update');
        $this->res['messages'] = null;
        $this->res['data'] = null;
    }

}