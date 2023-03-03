<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppWtdTypeClaimDocument extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_WTD_TYPE_CLAIM_DOCUMENT';
    public $timestamps = false;
}
