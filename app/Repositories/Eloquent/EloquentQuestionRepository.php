<?php
namespace App\Repositories\Eloquent;
use App\Models\Question;
use App\Repositories\QuestionRepositoryInterface;

class EloquentQuestionRepository extends EloquentBaseRepository implements QuestionRepositoryInterface {

    protected $modelClassName = Question::class;

}