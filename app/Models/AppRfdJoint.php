<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRfdJoint extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_RFD_JOINT';
    public $timestamps = false;
}
