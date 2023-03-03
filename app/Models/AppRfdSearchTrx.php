<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRfdSearchTrx extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_RFD_SEARCH_TRX';
    public $timestamps = false;
}
