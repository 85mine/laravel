<?php
namespace App\Repositories;
use App\Models\Company;
use App\Repositories\Abstracts\RepositoryAbstract;

class CompanyRepository extends RepositoryAbstract{

    protected $modelClassName = Company::class;

}