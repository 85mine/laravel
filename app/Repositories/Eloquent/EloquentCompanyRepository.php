<?php
namespace App\Repositories\Eloquent;
use App\Models\Company;
use App\Repositories\CompanyRepositoryInterface;

class EloquentCompanyRepository extends EloquentBaseRepository implements CompanyRepositoryInterface {
    protected $modelClassName = Company::class;
}