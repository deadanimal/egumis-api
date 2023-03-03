<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppFaqHeader extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_FAQ_HEADER';
    public $timestamps = false;
}
