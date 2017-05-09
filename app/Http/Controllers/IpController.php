<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Ip;

class IpController extends Controller
{
    public function index()
    {
        return view('backend.modules.ips.index');
    }
}
