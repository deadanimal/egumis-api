<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefBoJoint extends Model
{
    protected $guarded = ['id'];
    public $table = 'REF_BO_JOINT';
    // public $timestamps = false;

    public function appRfdBo()
    {
        return $this->hasOne(AppRfdBo::class, 'id', 'bo_master_id');
    }
}
