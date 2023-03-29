<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningNoUma extends Model
{
    protected $connection = "mysql";
    protected $guarded = ['id'];
    public $table = 'UMA';
    public $timestamps = false;
}
