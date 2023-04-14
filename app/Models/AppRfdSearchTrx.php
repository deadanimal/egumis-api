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

    public function refbomaster1()
    {
        return $this->belongsTo(RefBoMaster::class, 'search_value', 'new_ic_number');
    }
    public function refbomaster2()
    {
        return $this->belongsTo(RefBoMaster::class, 'search_value', 'old_ic_number');
    }
}
