<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $table = 'log_survey';

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
