<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class AuditLogMa extends Model
{
    protected $connection = "mysql";
    protected $guarded = ['id'];
    public $table = 'AUDIT_LOG_MA';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(SecUser::class, 'created_by');
    }
}
