<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRfdBo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_RFD_BO';
    public $timestamps = false;

    public function appRfdInfo()
    {
        return $this->belongsTo(AppRfdInfo::class, 'refund_info_id');
    }
}
