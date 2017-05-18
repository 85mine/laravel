<?php
namespace App\Repositories;
use App\Models\Customer;
use App\Repositories\Abstracts\RepositoryAbstract;

class CustomerRepository extends RepositoryAbstract{

    protected $modelClassName = Customer::class;

}