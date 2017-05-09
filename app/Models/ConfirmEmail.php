<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ConfirmEmail extends Model
{
    protected $guarded = array();
    protected $primaryKey = 'email';
    public $timestamps = false;
    public $incrementing = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['created_at'] = datetime_now();
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'email', 'email');
    }
}
