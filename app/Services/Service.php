<?php namespace App\Services;

class Service {

    protected $res;

    public function __construct() {
        $this->res['status'] = false;
        $this->res['messages'] = null;
        $this->res['data'] = null;
    }

}