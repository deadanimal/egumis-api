<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSystemConfig extends Model
{
    protected $guarded = ['id'];
    public $table = 'APP_SYSTEM_CONFIG';
    public $timestamps = false;
}
