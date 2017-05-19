<?php
namespace App\Repositories\Eloquent;
use App\Models\Ip;
use App\Repositories\IpRepositoryInterface;

class EloquentIpRepository extends EloquentBaseRepository implements IpRepositoryInterface {

    protected $modelClassName = Ip::class;

}