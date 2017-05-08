<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmEmail extends Model
{
    protected $guarded = array();

    protected $primaryKey = 'email';

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['created_at'] = $this->freshTimestamp();
    }
}
