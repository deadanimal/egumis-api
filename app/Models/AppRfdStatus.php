<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRfdStatus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_RFD_STATUS';
    public $timestamps = false;
}
