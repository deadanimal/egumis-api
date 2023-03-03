<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppEmailTemplate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_EMAIL_TEMPLATE';
    public $timestamps = false;
}
