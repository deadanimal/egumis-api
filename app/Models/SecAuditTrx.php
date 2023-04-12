<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecAuditTrx extends Model
{
    protected $guarded = ['id'];
    public $table = 'SEC_AUDIT_TRX';
    public $timestamps = false;
}
