<?php
namespace App\Repositories;
use App\Models\Question;
use App\Repositories\Abstracts\RepositoryAbstract;

class QuestionRepository extends RepositoryAbstract{

    protected $modelClassName = Question::class;

}