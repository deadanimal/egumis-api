<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLogMa extends Model
{
    protected $connection = "mysql";
    protected $guarded = ['id'];
    public $table = 'AUDIT_LOG_MA';
    public $timestamps = false;
}
