<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SecUser extends Authenticatable
{
    protected $connection = "sqlsrv";
    public $table = 'SEC_USER';
    public $timestamps = false;
    protected $guarded = ['id'];

}
