<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecAuditTrail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'SEC_AUDIT_TRAIL';
    public $timestamps = false;
}
