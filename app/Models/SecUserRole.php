<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecUserRole extends Model
{
    public $table = 'SEC_USER_ROLE';
    public $timestamps = false;
    protected $guarded = ['id'];
}
