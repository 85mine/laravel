<?php
namespace App\Repositories\Eloquent;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepositoryInterface {

    protected $modelClassName = User::class;

}