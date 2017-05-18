<?php
namespace App\Repositories;
use App\Models\Question;
use App\Models\User;
use App\Repositories\Abstracts\RepositoryAbstract;

class UserRepository extends RepositoryAbstract{

    protected $modelClassName = User::class;

}