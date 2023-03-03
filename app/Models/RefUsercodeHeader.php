<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefUsercodeHeader extends Model
{
    protected $guarded = ['id'];
    public $table = 'REF_USERCODE_HEADER';
    public $timestamps = false;
}
