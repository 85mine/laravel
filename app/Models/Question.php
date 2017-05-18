<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'content',
        'answer',
        'order',
        'status',
        'type',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
