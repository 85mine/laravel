<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;

class CustomerController extends Controller
{
    public function getCustomers(){
        $data = Customer::paginate(50);
        return view('backend.modules.customer.customers')->with("customers",$data);
    }

    public function getCreateCustomer(){

    }

    public function postCreateCustomer(){

    }

    public function getDetail(){

    }

    public function getEdit(){

    }

    public function postEdit(){

    }
}
