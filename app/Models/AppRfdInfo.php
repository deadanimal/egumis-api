<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRfdInfo extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $table = 'APP_RFD_INFO';
    public $timestamps = false;
    // protected $with = ['AppRfdStatus'];

    public function Payee()
    {
        return $this->hasMany(AppRfdPayee::class, 'refund_info_id');
    }

    public function Doc()
    {
        return $this->hasMany(AppRfdDoc::class, 'refundId');
    }

    public function Bo()
    {
        return $this->hasMany(AppRfdBo::class, 'refund_info_id');
    }

    public function AppRfdStatus()
    {
        return $this->hasOne(AppRfdStatus::class, 'rfd_id');
    }

}
