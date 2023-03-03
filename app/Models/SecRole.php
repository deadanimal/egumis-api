<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecRole extends Model
{
    protected $guarded = ['id'];
    public $table = 'SEC_ROLE';
    public $timestamps = false;
}
