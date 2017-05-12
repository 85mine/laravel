<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'company_address',
        'company_mobile',
        'company_email',
        'company_website',
        'representative_name',
        'representative_mobile',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at', 'company_description', 'representative_email'
    ];


}
