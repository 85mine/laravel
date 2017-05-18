<?php
namespace App\Repositories;
use App\Models\Ip;
use App\Repositories\Abstracts\RepositoryAbstract;

class IpRepository extends RepositoryAbstract{

    protected $modelClassName = Ip::class;

}