<?php
namespace App\Repositories\Eloquent;
use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;

class EloquentCustomerRepository extends EloquentBaseRepository implements CustomerRepositoryInterface {

    protected $modelClassName = Customer::class;

}