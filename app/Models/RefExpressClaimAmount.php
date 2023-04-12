<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefExpressClaimAmount extends Model
{
    protected $guarded = ['id'];
    public $table = 'REF_EXPRESS_CLAIM_AMOUNT';
    public $timestamps = false;
}
